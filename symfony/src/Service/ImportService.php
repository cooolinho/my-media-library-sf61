<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\TvShow;
use App\Helper\TheTVDBHelper;
use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\EpisodeBaseRecord;
use Cooolinho\Bundle\TVDBApiBundle\Service\SeriesService;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;

class ImportService
{
    protected SeriesService $api;
    protected EntityManagerInterface $entityManager;

    public function __construct(
        SeriesService $api,
        EntityManagerInterface $entityManager,
    ) {
        $this->api = $api;
        $this->entityManager = $entityManager;
    }

    public function importEpisodesFromTheTVDB(TvShow $tvShow, int $page = 0): void
    {
        if ($tvShow->getTheTvDbId()) {
            $response = $this->api->getSeriesEpisodes(
                $tvShow->getTheTvDbId(),
                SeriesService::SEASON_TYPE_DEFAULT,
                SeriesService::LANG_DE,
                $page
            );

            $this->importEpisodes($tvShow, $response->getEpisodes());

            if ($response->getNextPageNr() > $response->getSelfPageNr()) {
                $this->importEpisodesFromTheTVDB($tvShow, $response->getNextPageNr());
            }
        }
    }

    /**
     * @param TvShow $tvShow
     * @param ArrayCollection<int, EpisodeBaseRecord>  $episodes
     * @return void
     */
    private function importEpisodes(TvShow $tvShow, ArrayCollection $episodes): void
    {
        foreach ($episodes as $episodeBaseRecord) {
            if (0 === $episodeBaseRecord->seasonNumber) {
                continue;
            }

            $this->entityManager->persist(TheTVDBHelper::createEpisodeByEpisodeBaseRecord($tvShow, $episodeBaseRecord));
        }

        $this->entityManager->flush();
    }
}
