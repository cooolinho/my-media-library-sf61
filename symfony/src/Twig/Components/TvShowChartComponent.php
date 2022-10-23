<?php

namespace App\Twig\Components;

use App\Controller\Admin\DashboardController;
use App\Controller\Admin\TvShowCrudController;
use App\Repository\TvShowRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('tv_show_chart')]
final class TvShowChartComponent
{
    private ChartBuilderInterface $chartBuilder;
    private TvShowRepository $tvShowRepository;
    private int $countAll;
    private int $countCompleted;
    private AdminUrlGenerator $adminUrlGenerator;

    public function __construct(
        ChartBuilderInterface $chartBuilder,
        TvShowRepository $tvShowRepository,
        AdminUrlGenerator $adminUrlGenerator
    ) {
        $this->chartBuilder = $chartBuilder;
        $this->tvShowRepository = $tvShowRepository;
        $this->adminUrlGenerator = $adminUrlGenerator;

        $this->countAll = $this->tvShowRepository->getCountAll();
        $this->countCompleted = $this->tvShowRepository->getCountComplete();
    }

    public function getChart(): Chart
    {
        $chart = $this->chartBuilder->createChart(Chart::TYPE_PIE);
        $chart->setData([
            'labels' => ['Complete', 'Noch offen'],
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => ['#92e51d', '#ff6e2b'],
                    'borderColor' => '#ffffff',
                    'data' => [
                        $this->countCompleted,
                        $this->countAll - $this->countCompleted,
                    ],
                ],
            ],
        ]);

        return $chart;
    }

    public function countAll(): int
    {
        return $this->countAll;
    }

    public function getCountCompleted(): int
    {
        return $this->countCompleted;
    }

    public function getAdminCrudIndexUrl(): string
    {
        return $this->adminUrlGenerator
            ->setDashboard(DashboardController::class)
            ->setController(TvShowCrudController::class)
            ->setAction(Action::INDEX)
            ->generateUrl();
    }
}
