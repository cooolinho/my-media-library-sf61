<?php

namespace App\Twig\Components;

use App\Repository\TvShowRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('dashboard_episodes_missing')]
final class DashboardEpisodesMissingComponent
{
    protected TvShowRepository $tvShowRepository;

    public function __construct(TvShowRepository $tvShowRepository)
    {
        $this->tvShowRepository = $tvShowRepository;
    }

    public function getTvShows(): array
    {
        return $this->tvShowRepository->findAll();
    }
}
