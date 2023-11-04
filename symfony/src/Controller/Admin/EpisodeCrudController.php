<?php

namespace App\Controller\Admin;

use App\Entity\Episode;
use Cooolinho\Bundle\TVDBApiBundle\Request\Episodes;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\HttpFoundation\Response;

class EpisodeCrudController extends AbstractCrudController
{
    public function __construct(protected Episodes $episodesApi)
    {
    }
    public static function getEntityFqcn(): string
    {
        return Episode::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->showEntityActionsInlined();
    }

    public function configureActions(Actions $actions): Actions
    {
        return parent::configureActions($actions)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->remove(Crud::PAGE_DETAIL, Action::DELETE)
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
            ->remove(Crud::PAGE_INDEX, Action::EDIT)
            ->remove(Crud::PAGE_DETAIL, Action::EDIT)
            ->remove(Crud::PAGE_INDEX, Action::NEW);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new(Episode::name)->hideOnForm(),
            NumberField::new(Episode::seasonNumber)->hideOnForm(),
            NumberField::new(Episode::number)->hideOnForm(),
            NumberField::new(Episode::theTvDbId)->hideOnForm(),
            BooleanField::new(Episode::isOwned)->hideOnForm(),
        ];
    }

    public function detail(AdminContext $context): KeyValueStore|Response
    {
        /** @var Episode $episode */
        $episode = $context->getEntity()->getInstance();

        return $this->render('admin/episode/show.html.twig', array_merge(parent::detail($context)->all(), [
            'episode' => $this->episodesApi->getEpisodeBase($episode->getTheTvDbId())->getEpisodeBaseRecord(),
        ]));
    }
}
