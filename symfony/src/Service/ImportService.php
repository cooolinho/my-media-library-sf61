<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\TvShow;
use App\Helper\TheTVDBHelper;
use Cooolinho\Bundle\TVDBApiBundle\Model\Response\SeriesEpisodesResponse;
use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\EpisodeBaseRecord;
use Cooolinho\Bundle\TVDBApiBundle\Request\Series;
use Cooolinho\Bundle\TVDBApiBundle\Service\SeriesService;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;

class ImportService
{
    public function __construct(
        private readonly Series                 $api,
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    public function importTvShowDataFromTheTVDB(TvShow $tvShow, int $page = 0): void
    {
        if ($tvShow->getTheTvDbId()) {
            $response = $this->api->getSeriesSeasonEpisodesTranslated($tvShow->getTheTvDbId(), $page);

            $this->updateTvShowByResponse($tvShow, $response);

            if ($response->getNextPageNr() > $response->getSelfPageNr()) {
                $this->importTvShowDataFromTheTVDB($tvShow, $response->getNextPageNr());
            }

            $this->entityManager->flush();
        }
    }

    private function updateTvShowByResponse(TvShow $tvShow, SeriesEpisodesResponse $response): void
    {
        $tvShow->setSlug($response->getSeries()->getSlug());
        $tvShow->setStatus($response->getSeries()->getStatus()->getName());
        $tvShow->setImage($response->getSeries()->getImage());
        $tvShow->setYear($response->getSeries()->getYear());

        $this->entityManager->persist($tvShow);

        $this->importEpisodes($tvShow, $response->getEpisodes());
    }

    /**
     * @param ArrayCollection<int, EpisodeBaseRecord> $episodes
     */
    private function importEpisodes(TvShow $tvShow, ArrayCollection $episodes): void
    {
        foreach ($episodes as $episodeBaseRecord) {
            $episodeAlreadyExist = (bool) $tvShow->getEpisodeBySeasonAndNumber(
                $episodeBaseRecord->seasonNumber,
                $episodeBaseRecord->number
            );

            if (0 === $episodeBaseRecord->seasonNumber || $episodeAlreadyExist) {
                continue;
            }

            $this->entityManager->persist(TheTVDBHelper::createEpisodeByEpisodeBaseRecord($tvShow, $episodeBaseRecord));
        }
    }
}
