<?php

namespace App\Twig\Components;

use App\Repository\TvShowRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('episodes')]
final class EpisodesComponent
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
