<?php

declare(strict_types=1);

namespace App\Twig\Components;

use App\Entity\Artwork;
use App\Entity\TvShow;
use App\Repository\TvShowRepository;
use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\ArtworkType;
use Cooolinho\Bundle\TVDBApiBundle\Request\Series;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('artwork')]
final class ArtworkComponent
{
    #[ExposeInTemplate]
    public ?int $tvshow_id = null;
    public TvShow|null $tvShow = null;

    public function __construct(
        private readonly TvShowRepository $tvShowRepository,
        private readonly Series           $seriesService
    )
    {
    }

    public function getMedia(): array
    {
        $tvShow = $this->tvShowRepository->find($this->tvshow_id);

        if (!is_numeric($this->tvshow_id) || !$tvShow || !$tvShow->getTheTvDbId()) {
            return [];
        }

        $result = $this->seriesService->getSeriesArtworks($tvShow->getTheTvDbId());

        return [
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
