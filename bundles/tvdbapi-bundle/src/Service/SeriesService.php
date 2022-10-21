<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Service;

use Cooolinho\Bundle\TVDBApiBundle\Model\Response\SeriesEpisodesResponse;

class SeriesService extends AbstractService
{
    public function getSeriesEpisodes(int $id, string $seasonType = 'default'): SeriesEpisodesResponse
    {
        $response = $this->api->request(sprintf('series/%s/episodes/%s', $id, $seasonType));

        return new SeriesEpisodesResponse($response);
    }
}
