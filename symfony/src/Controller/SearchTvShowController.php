<?php

namespace App\Controller;

use App\Controller\Admin\DashboardController;
use App\Form\TvShowSearchFormType;
use Cooolinho\Bundle\TVDBApiBundle\Model\Search;
use Cooolinho\Bundle\TVDBApiBundle\Request\Search as SearchRequest;
use Doctrine\Common\Collections\ArrayCollection;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchTvShowController extends AbstractController
{
    public function __construct(protected SearchRequest $searchApi, protected AdminUrlGenerator $adminUrlGenerator)
    {
    }

    #[Route('/search/tv/show', name: 'app_search_tv_show')]
    public function index(Request $request): Response
    {
        $searchResult = new ArrayCollection();
        $search = new Search();

        $url = $this->adminUrlGenerator
            ->setDashboard(DashboardController::class)
            ->setController(self::class)
            ->setRoute('app_search_tv_show')
            ->generateUrl();

        $form = $this->createForm(TvShowSearchFormType::class, $search, [
            'method' => 'POST',
            'action' => $url,
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $searchResponse = $this->searchApi->getSearchResults($search->getQuery(), $search->getType());
            $searchResult = $searchResponse->getResults();
        }

        return $this->render('search_tv_show/index.html.twig', [
            'form' => $form->createView(),
            'searchResults' => $searchResult,
        ]);
    }
}
