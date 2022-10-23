<?php

namespace App\Twig\Components;

use App\Repository\TvShowRepository;
use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\ArtworkType;
use Cooolinho\Bundle\TVDBApiBundle\Service\SeriesService;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('artwork')]
final class ArtworkComponent
{
    #[ExposeInTemplate]
    public ?int $tvshow_id = null;
    private SeriesService $seriesService;
    private TvShowRepository $tvShowRepository;

    public function __construct(
        TvShowRepository $tvShowRepository,
        SeriesService $seriesService
    ) {
        $this->tvShowRepository = $tvShowRepository;
        $this->seriesService = $seriesService;
    }

    public function getMedia(): array
    {
        $media = [];

        if (is_numeric($this->tvshow_id) && $tvShow = $this->tvShowRepository->find($this->tvshow_id)) {
            $result = $this->seriesService->getSeriesArtworks($tvShow->getTheTvDbId());

            $media = [
                ArtworkType::SERIES_BACKGROUND => [
                    'title' => 'Hintergrund',
                    'artworks' => $result->getArtworksByType(ArtworkType::SERIES_BACKGROUND),
                ],
                ArtworkType::SERIES_BANNER => [
                    'title' => 'Banner',
                    'artworks' => $result->getArtworksByType(ArtworkType::SERIES_BANNER),
                ],
                ArtworkType::SERIES_POSTER => [
                    'title' => 'Poster',
                    'artworks' => $result->getArtworksByType(ArtworkType::SERIES_POSTER),
                ],
            ];
        }

        return $media;
    }
}
