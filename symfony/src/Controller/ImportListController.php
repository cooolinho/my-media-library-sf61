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
    protected TvShowRepository $tvShowRepository;

    public function __construct(
        AdminUrlGenerator $adminUrlGenerator,
        EpisodeRepository $episodeRepository,
        EntityManagerInterface $entityManager,
        FilesReaderService $filesReaderService,
        TvShowRepository $tvShowRepository
    ) {
        $this->adminUrlGenerator = $adminUrlGenerator;
        $this->episodeRepository = $episodeRepository;
        $this->entityManager = $entityManager;
        $this->filesReaderService = $filesReaderService;
        $this->tvShowRepository = $tvShowRepository;
    }

    /**
     * make list on filesystem
     * find . -mindepth 0 -maxdepth 2 -printf '%M %u %g %p\n' >> list.txt.
     */
    #[Route('/import/list/tvshow/{tvShowId}', name: 'app_import_tvshow_list')]
    public function importTvShowList(Request $request): Response
    {
        $tvShow = $this->tvShowRepository->find($request->get('tvShowId'));

        if (!$tvShow) {
            return $this->redirect($request->query->get('referer'));
        }

        $form = $this->createForm(ImportListFormType::class, [], [
            'method' => 'POST',
            'action' => $this->adminUrlGenerator
                ->setController(self::class)
                ->setDashboard(DashboardController::class)
                ->setRoute('app_import_tvshow_list', ['tvShowId' => $tvShow->getId()])
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

        return $this->render('import_list/tvshow.html.twig', [
            'tvShow' => $tvShow,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/import/list/all', name: 'app_import_all_list')]
    public function importAllList(Request $request): Response
    {
        $form = $this->createForm(ImportListFormType::class, [], [
            'method' => 'POST',
            'action' => $this->adminUrlGenerator
                ->setController(self::class)
                ->setDashboard(DashboardController::class)
                ->setRoute('app_import_all_list')
                ->generateUrl(),
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $tvShows = $this->tvShowRepository->findAll();
            $fileData = $form->get('text')->getData();

            foreach ($tvShows as $tvShow) {
                $this->filesReaderService->matchEpisodesFromText($tvShow, $fileData);
            }

            return $this->redirect($this->adminUrlGenerator
                ->setDashboard(DashboardController::class)
                ->setController(TvShowCrudController::class)
                ->setAction(Action::INDEX)
                ->generateUrl());
        }

        return $this->render('import_list/all.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
