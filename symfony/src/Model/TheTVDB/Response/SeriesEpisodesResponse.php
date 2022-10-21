<?php declare(strict_types=1);

namespace App\Model\TheTVDB\Response;

use App\Model\TheTVDB\Schema\EpisodeBaseRecord;
use Doctrine\Common\Collections\ArrayCollection;

class SeriesEpisodesResponse
{
    protected ApiResponse $response;

    public function __construct(ApiResponse $response)
    {
        $this->response = $response;
    }

    public function getSeries(): array
    {
        return $this->response->getData()['series'];
    }

    /**
     * @return ArrayCollection<int, EpisodeBaseRecord>
     */
    public function getEpisodes(): ArrayCollection
    {
        $episodes = new ArrayCollection();

        foreach ($this->response->getData()['episodes'] as $episodeData) {
            $episodes->add(new EpisodeBaseRecord($episodeData));
        }

        return $episodes;
    }
}
