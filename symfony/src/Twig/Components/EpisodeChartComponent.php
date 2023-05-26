<?php

namespace App\Twig\Components;

use App\Repository\EpisodeRepository;
use App\Repository\TvShowRepository;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('episode_chart')]
final class EpisodeChartComponent
{
    private ChartBuilderInterface $chartBuilder;
    private EpisodeRepository $episodeRepository;

    #[ExposeInTemplate]
    public ?int $tvshowId = null;
    private int $countAll = 0;
    private int $countOwned = 0;
    private TvShowRepository $tvShowRepository;

    public function __construct(
        ChartBuilderInterface $chartBuilder,
        EpisodeRepository $episodeRepository,
        TvShowRepository $tvShowRepository,
    ) {
        $this->chartBuilder = $chartBuilder;
        $this->episodeRepository = $episodeRepository;
        $this->tvShowRepository = $tvShowRepository;

        $this->countAll = $this->episodeRepository->getCountAll();
        $this->countOwned = $this->episodeRepository->getCountOwned();
    }

    public function getChart(): Chart
    {
        if ($this->tvshowId) {
            $this->countAll = $this->getCountAll();
            $this->countOwned = $this->getCountOwned();
        }

        $chart = $this->chartBuilder->createChart(Chart::TYPE_PIE);
        $chart->setData([
            'labels' => ['Im Besitz', 'Fehlend'],
            'datasets' => [
                [
                    'backgroundColor' => ['#92e51d', '#ff6e2b'],
                    'borderColor' => '#ffffff',
                    'data' => [
                        $this->countOwned,
                        $this->countAll - $this->countOwned,
                    ],
                ],
            ],
        ]);

        return $chart;
    }

    public function getCountAll(): int
    {
        if ($this->tvshowId && $tvShow = $this->tvShowRepository->find($this->tvshowId)) {
            $this->countAll = $this->episodeRepository->getCountByTvShow($tvShow);
        }

        return $this->countAll;
    }

    public function getCountOwned(): int
    {
        if ($this->tvshowId && $tvShow = $this->tvShowRepository->find($this->tvshowId)) {
            $this->countOwned = $this->episodeRepository->getCountOwnedByTvShow($tvShow);
        }

        return $this->countOwned;
    }
}
