<?php

namespace App\Twig\Components;

use App\Entity\Artwork;
use App\Entity\TvShow;
use App\Repository\ArtworkRepository;
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
    public TvShow|null $tvShow = null;
    protected ArtworkRepository $artworkRepository;
    private SeriesService $seriesService;
    private TvShowRepository $tvShowRepository;

    public function __construct(
        TvShowRepository  $tvShowRepository,
        ArtworkRepository $artworkRepository,
        SeriesService     $seriesService
    )
    {
        $this->tvShowRepository = $tvShowRepository;
        $this->seriesService = $seriesService;
        $this->artworkRepository = $artworkRepository;
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

    public function getLocalMedia(): array
    {
        $artworks = $this->getTvShow()->getArtworks();

        return [
            ArtworkType::SERIES_BACKGROUND => [
                'title' => 'Hintergrund',
                'artworks' => $artworks->filter(function (Artwork $artwork) {
                    return $artwork->getType() === ArtworkType::SERIES_BACKGROUND;
                }),
            ],
            ArtworkType::SERIES_BANNER => [
                'title' => 'Banner',
                'artworks' => $artworks->filter(function (Artwork $artwork) {
                    return $artwork->getType() === ArtworkType::SERIES_BANNER;
                }),
            ],
            ArtworkType::SERIES_POSTER => [
                'title' => 'Poster',
                'artworks' => $artworks->filter(function (Artwork $artwork) {
                    return $artwork->getType() === ArtworkType::SERIES_POSTER;
                }),
            ],
        ];
    }

    private function getTvShow(): ?TvShow
    {
        if ($this->tvShow === null) {
            $this->tvShow = $this->tvShowRepository->find($this->tvshow_id);
        }

        return $this->tvShow;
    }
}
