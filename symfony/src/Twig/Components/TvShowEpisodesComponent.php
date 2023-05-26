<?php

namespace App\Twig\Components;

use App\Entity\TvShow;
use App\Repository\TvShowRepository;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('tv_show_episodes')]
final class TvShowEpisodesComponent
{
    #[ExposeInTemplate]
    public ?int $tvshowId = null;

    protected TvShowRepository $tvShowRepository;

    public function __construct(TvShowRepository $tvShowRepository)
    {
        $this->tvShowRepository = $tvShowRepository;
    }

    public function getTvShow(): ?TvShow
    {
        return $this->tvShowRepository->find($this->tvshowId);
    }
}
