<?php

namespace App\Service;

use App\Entity\Artwork;
use App\Entity\TvShow;
use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\ArtworkExtendedRecord;
use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\ArtworkType;
use Cooolinho\Bundle\TVDBApiBundle\Service\SeriesService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TvShowService
{
    protected ParameterBagInterface $parameterBag;
    protected EntityManagerInterface $entityManager;
    protected FileDownloaderService $fileDownloader;
    private SeriesService $seriesService;
    private static array $supportedArtworkTypes = [
        ArtworkType::SERIES_BACKGROUND,
        ArtworkType::SERIES_BANNER,
        ArtworkType::SERIES_POSTER,
    ];

    public function __construct(
        SeriesService          $seriesService,
        ParameterBagInterface  $parameterBag,
        EntityManagerInterface $entityManager,
        FileDownloaderService  $fileDownloader
    )
    {
        $this->seriesService = $seriesService;
        $this->parameterBag = $parameterBag;
        $this->entityManager = $entityManager;
        $this->fileDownloader = $fileDownloader;
    }

    public function downloadArtwork(TvShow $tvShow): void
    {
        $result = $this->seriesService->getSeriesArtworks($tvShow->getTheTvDbId());
        $artworks = $result->getArtworksByTypes(self::$supportedArtworkTypes);

        /** @var ArtworkExtendedRecord $artwork */
        foreach ($artworks as $artwork) {
            if ($artwork->image === '') {
                continue;
            }

            $this->downloadAndCreateArtworkEntity($tvShow, $artwork->image, $artwork->type);
        }
    }

    private function downloadAndCreateArtworkEntity(TvShow $tvShow, string $url, int $type): void
    {
        if ($filename = $this->fileDownloader->downloadFromUrl($url, $this->getArtworkDirectory($tvShow))) {
            $artwork = new Artwork();
            $artwork->setFilename($filename);
            $artwork->setTvshow($tvShow);
            $artwork->setType($type);

            $this->entityManager->persist($artwork);
            $this->entityManager->flush();
        }
    }

    public function getArtworkDirectory(TvShow $tvShow): string
    {
        return sprintf('%s/public/%s/%s',
            $this->parameterBag->get('kernel.project_dir'),
            $this->parameterBag->get('tvshow.artwork_directory_public'),
            $tvShow->getTheTvDbId()
        );
    }

    public function getArtworkPublicDirectory(TvShow $tvShow): string
    {
        return sprintf('%s/%s',
            $this->parameterBag->get('tvshow.artwork_directory_public'),
            $tvShow->getTheTvDbId()
        );
    }

    public function createArtworkZipFile(TvShow $tvShow): BinaryFileResponse
    {
        $filesystem = new Filesystem();
        $filesToZip = [];

        foreach ($tvShow->getArtworks() as $artwork) {
            $artworkFilePath = sprintf('%s/%s',
                $this->getArtworkDirectory($tvShow),
                $artwork->getFilename()
            );

            if (!$filesystem->exists($artworkFilePath)) {
                continue;
            }

            $filesToZip[] = $artworkFilePath;
        }

        $zipFilePath = sprintf('%s/%s', $this->getArtworkDirectory($tvShow), 'artwork.zip');
        $zipFilename = sprintf('%s.zip', $tvShow->getSlug());

        return $this->fileDownloader->downloadFilesAsZip(
            $filesToZip,
            $zipFilePath,
            $zipFilename
        );
    }
}
