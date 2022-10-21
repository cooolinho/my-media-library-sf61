<?php declare(strict_types=1);

namespace App\Service;

use App\Entity\TvShow;
use App\Helper\TheTVDBHelper;
use App\Model\TheTVDB\Schema\EpisodeBaseRecord;
use App\Service\TheTVDB\SeriesApiService;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;

class ImportService
{
    protected SeriesApiService $api;
    protected EntityManagerInterface $entityManager;

    public function __construct(
        SeriesApiService       $api,
        EntityManagerInterface $entityManager,
    )
    {
        $this->api = $api;
        $this->entityManager = $entityManager;
    }

    public function importEpisodesFromTheTVDB(TvShow $tvShow): void
    {
        if ($tvShow->getTheTvDbId()) {
            $response = $this->api->getSeriesEpisodes($tvShow->getTheTvDbId());
            $this->importEpisodes($tvShow, $response->getEpisodes());
        }
    }

    /**
     * @param TvShow $tvShow
     * @param ArrayCollection<int, EpisodeBaseRecord> $episodes
     * @return void
     */
    private function importEpisodes(TvShow $tvShow, ArrayCollection $episodes): void
    {
        foreach ($episodes as $episodeBaseRecord) {
            if ($episodeBaseRecord->seasonNumber === 0) {
                continue;
            }

            $this->entityManager->persist(TheTVDBHelper::createEpisodeByEpisodeBaseRecord($tvShow, $episodeBaseRecord));
        }

        $this->entityManager->flush();
    }
}
