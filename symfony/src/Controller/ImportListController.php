<?php

namespace App\Controller;

use App\Controller\Admin\DashboardController;
use App\Controller\Admin\TvShowCrudController;
use App\Form\ImportListFormType;
use App\Repository\EpisodeRepository;
use App\Repository\TvShowRepository;
use App\Service\FilesReaderService;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImportListController extends AbstractController
{
    protected AdminUrlGenerator $adminUrlGenerator;
    protected EpisodeRepository $episodeRepository;
    protected EntityManagerInterface $entityManager;
    protected FilesReaderService $filesReaderService;

    public function __construct(
        AdminUrlGenerator      $adminUrlGenerator,
        EpisodeRepository      $episodeRepository,
        EntityManagerInterface $entityManager,
        FilesReaderService     $filesReaderService,
    )
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
        $this->episodeRepository = $episodeRepository;
        $this->entityManager = $entityManager;
        $this->filesReaderService = $filesReaderService;
    }

    /**
     * make list on filesystem
     * find . -mindepth 0 -maxdepth 2 -printf '%M %u %g %p\n' >> list.txt
     */
    #[Route('/import/list/{tvShowId}', name: 'app_import_list')]
    public function index(Request $request, TvShowRepository $tvShowRepository): Response
    {
        $tvShow = $tvShowRepository->find($request->get('tvShowId'));

        if (!$tvShow) {
            return $this->redirect($request->query->get('referer'));
        }

        $form = $this->createForm(ImportListFormType::class, [], [
            'method' => 'POST',
            'action' => $this->adminUrlGenerator
                ->setController(self::class)
                ->setDashboard(DashboardController::class)
                ->setRoute('app_import_list', ['tvShowId' => $tvShow->getId()])
                ->generateUrl(),
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->filesReaderService->matchEpisodesFromText($tvShow, $form->get('text')->getData());

            return $this->redirect($this->adminUrlGenerator
                ->setDashboard(DashboardController::class)
                ->setController(TvShowCrudController::class)
                ->setAction(Action::DETAIL)
                ->setEntityId($tvShow->getId())
                ->generateUrl());
        }

        return $this->render('import_list/index.html.twig', [
            'controller_name' => 'ImportListController',
            'tvShow' => $tvShow,
            'form' => $form->createView(),
        ]);
    }
}
