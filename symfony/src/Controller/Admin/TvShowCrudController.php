<?php

namespace App\Controller\Admin;

use App\Controller\ImportListController;
use App\Entity\TvShow;
use App\Service\FilesReaderService;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class TvShowCrudController extends AbstractCrudController
{
    protected FilesReaderService $filesystemReader;
    protected EntityManagerInterface $entityManager;
    protected ParameterBagInterface $parameterBag;
    protected AdminUrlGenerator $adminUrlGenerator;

    public function __construct(
        FilesReaderService     $filesystemReader,
        EntityManagerInterface $entityManager,
        ParameterBagInterface  $parameterBag,
        AdminUrlGenerator      $adminUrlGenerator
    )
    {
        $this->filesystemReader = $filesystemReader;
        $this->entityManager = $entityManager;
        $this->parameterBag = $parameterBag;
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    public static function getEntityFqcn(): string
    {
        return TvShow::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new(TvShow::name),
            IdField::new(TvShow::theTvDbId),
            AssociationField::new(TvShow::episodes)
                ->onlyOnDetail()
                ->setTemplatePath('admin/tvshow/crud/field/episodes.html.twig'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        $searchAction = Action::new(
            'app_search_tv_show',
            'Suche',
            'fas fa-search'
        )
            ->linkToRoute('app_search_tv_show');

        $importListAction = Action::new(
            'app_import_list',
            'Liste importieren',
            'fas fa-file'
        )
            ->linkToCrudAction('redirectToImportListAction');

        $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
        $actions->add(Crud::PAGE_NEW, $searchAction);
        $actions->add(Crud::PAGE_DETAIL, $importListAction);

        return parent::configureActions($actions);
    }

    public function detail(AdminContext $context): KeyValueStore|Response
    {
        $this->filesystemReader->readTvShowDirectory($context->getEntity()->getInstance());

        return parent::detail($context);
    }

    public function createNewFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context): FormBuilderInterface
    {
        /** @var TvShow $entry */
        $entry = $entityDto->getInstance();
        $formBuilder = parent::createNewFormBuilder($entityDto, $formOptions, $context);

        if ($name = $context->getRequest()->get(TvShow::name)) {
            $entry->setName($name);
        }

        if ($theTvDbId = $context->getRequest()->get(TvShow::theTvDbId)) {
            $entry->setTheTvDbId($theTvDbId);
        }

        return $formBuilder;
    }

    public function redirectToImportListAction(AdminContext $context): RedirectResponse
    {
        return $this->redirect($this->adminUrlGenerator
            ->setController(ImportListController::class)
            ->setDashboard(DashboardController::class)
            ->setRoute('app_import_list', ['tvShowId' => $context->getEntity()->getInstance()->getId()])
            ->generateUrl());
    }
}
