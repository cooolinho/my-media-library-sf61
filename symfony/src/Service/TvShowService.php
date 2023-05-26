<?php

namespace App\Service;

use App\Entity\Artwork;
use App\Entity\TvShow;
use App\Repository\TvShowRepository;
use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\ArtworkExtendedRecord;
use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\ArtworkType;
use Cooolinho\Bundle\TVDBApiBundle\Service\SeriesService;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;

class TvShowService
{
    protected LoggerInterface $logger;
    protected ParameterBagInterface $parameterBag;
    protected EntityManagerInterface $entityManager;
    private SeriesService $seriesService;
    private TvShowRepository $tvShowRepository;

    private static array $supportedArtworkTypes = [
        ArtworkType::SERIES_BACKGROUND,
        ArtworkType::SERIES_BANNER,
        ArtworkType::SERIES_POSTER,
    ];

    public function __construct(
        TvShowRepository $tvShowRepository,
        SeriesService $seriesService,
        LoggerInterface $logger,
        ParameterBagInterface $parameterBag,
        EntityManagerInterface $entityManager
    ) {
        $this->tvShowRepository = $tvShowRepository;
        $this->seriesService = $seriesService;
        $this->logger = $logger;
        $this->parameterBag = $parameterBag;
        $this->entityManager = $entityManager;
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

            $this->downloadAndSaveFileAction($tvShow, $artwork->image, $artwork->type);
        }
    }

    public function downloadAndSaveFileAction(TvShow $tvShow, string $url, int $type): void
    {
        $client = HttpClient::create();

        try {
            $response = $client->request('GET', $url);

            // Überprüfe den Statuscode der Antwort
            if ($response->getStatusCode() === Response::HTTP_OK) {
                $content = $response->getContent();
                $filename = pathinfo($url, PATHINFO_BASENAME);

                $artworkRootDir = $this->parameterBag->get('tvshow.artwork_directory');
                $filesystem = new Filesystem();

                $tvShowRootDir = sprintf('%s/%s',
                    $artworkRootDir,
                    $tvShow->getTheTvDbId()
                );

                if (!$filesystem->exists($tvShowRootDir)) {
                    $filesystem->mkdir($tvShowRootDir);
                }

                $path = sprintf('%s/%s',
                    $tvShowRootDir,
                    $filename
                );

                if (!$filesystem->exists($path)) {
                    file_put_contents($path, $content);

                    $artwork = new Artwork();
                    $artwork->setFilename($filename);
                    $artwork->setTvshow($tvShow);
                    $artwork->setType($type);

                    $this->entityManager->persist($artwork);
                }
            }
        } catch (\Throwable $e) {
            $this->logger->error($e->getMessage());
        }

        $this->entityManager->flush();
    }
}
