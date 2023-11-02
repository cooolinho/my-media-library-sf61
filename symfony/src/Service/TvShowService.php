<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Artwork;
use App\Entity\TvShow;
use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\ArtworkExtendedRecord;
use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\ArtworkType;
use Cooolinho\Bundle\TVDBApiBundle\Request\Series;
use Cooolinho\Bundle\TVDBApiBundle\Service\SeriesService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TvShowService
{
    private static array $supportedArtworkTypes = [
        ArtworkType::SERIES_BACKGROUND,
        ArtworkType::SERIES_BANNER,
        ArtworkType::SERIES_POSTER,
    ];

    public function __construct(
        private readonly Series          $seriesService,
        private readonly ParameterBagInterface  $parameterBag,
        private readonly EntityManagerInterface $entityManager,
        private readonly FileDownloaderService  $fileDownloader
    )
    {
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
        return sprintf('%s/public/%s',
            $this->parameterBag->get('kernel.project_dir'),
            $this->getArtworkPublicDirectory($tvShow),
        );
    }

    public function getArtworkPublicDirectory(TvShow $tvShow): string
    {
        return sprintf('%s/%s',
            $this->parameterBag->get('tvshow.artwork_directory_public'),
            $tvShow->getTheTvDbId()
        );
    }

    public function createArtworkZipFile(TvShow $tvShow): ?BinaryFileResponse
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

        if (empty($filesToZip)) {
            return null;
        }

        return $this->fileDownloader->downloadFilesAsZip(
            $filesToZip,
            $zipFilePath,
            $zipFilename
        );
    }

    /**
     * Liest die Dateien lokal über den Finder aus, anstatt es aus der Datenbank zu lesen
     *
     * @param TvShow $tvShow
     * @return array
     */
    private function getLocalArtworkFiles(TvShow $tvShow): array
    {
        $finder = new Finder();
        $finder->files()->in($this->getArtworkDirectory($tvShow));

        $files = [];
        if ($finder->hasResults()) {
            /** @var SplFileInfo $file */
            foreach ($finder as $file) {
                $files[] = sprintf('%s/%s',
                    $this->getArtworkDirectory($tvShow),
                    $file->getFilename()
                );
            }
        }

        return $files;
    }
}
