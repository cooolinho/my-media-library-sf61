<?php

namespace App\Twig\Components;

use App\Entity\Artwork;
use App\Entity\TvShow;
use App\Repository\ArtworkRepository;
use App\Repository\TvShowRepository;
use App\Service\TvShowService;
use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\ArtworkType;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsTwigComponent('tv_show_artwork_local')]
final class TvShowArtworkLocalComponent
{
    #[ExposeInTemplate]
    public ?int $tvshow_id = null;
    public TvShow|null $tvShow = null;
    protected ArtworkRepository $artworkRepository;
    protected TvShowService $tvShowService;
    private TvShowRepository $tvShowRepository;

    public function __construct(
        TvShowRepository  $tvShowRepository,
        ArtworkRepository $artworkRepository,
        TvShowService $tvShowService
    )
    {
        $this->tvShowRepository = $tvShowRepository;
        $this->artworkRepository = $artworkRepository;
        $this->tvShowService = $tvShowService;
    }

    public function getMedia(): array
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

    public function getArtworkUrl(Artwork $artwork): string
    {
        return sprintf('%s/%s',
            $this->tvShowService->getArtworkPublicDirectory($this->getTvShow()),
            $artwork->getFilename()
        );
    }
}
