<?php declare(strict_types=1);

namespace App\Service\TheTVDB;

use App\Model\TheTVDB\Response\SeriesEpisodesResponse;

class SeriesApiService extends AbstractApiService
{
    public function getSeriesEpisodes(int $id, string $seasonType = 'default'): SeriesEpisodesResponse
    {
        $response = $this->api->request(sprintf('series/%s/episodes/%s', $id, $seasonType));

        return new SeriesEpisodesResponse($response);
    }
}
