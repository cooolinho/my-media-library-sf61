<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Request;

use Cooolinho\Bundle\TVDBApiBundle\Api\SeasonType;
use Cooolinho\Bundle\TVDBApiBundle\Model\Response\SeriesArtworksResponse;
use Cooolinho\Bundle\TVDBApiBundle\Model\Response\SeriesEpisodesResponse;

class Series extends BaseRequest
{
    public function getSeriesSeasonEpisodesTranslated(
        int    $seriesId,
        int    $page = 0,
        string $seasonType = SeasonType::DEFAULT,
        string $lang = Languages::DEU,
    ): SeriesEpisodesResponse
    {
        $response = $this->api->request(
            sprintf('series/%s/episodes/%s/%s', $seriesId, $seasonType, $lang),
            [
                'page' => $page,
            ]
        );

        return new SeriesEpisodesResponse($response);
    }

    public function getSeriesArtworks(int $seriesId, string $lang = null, int $type = null): SeriesArtworksResponse
    {
        $query = [];
        if (is_string($lang)) {
            $query['lang'] = $lang;
        }

        if (is_numeric($type)) {
            $query['type'] = $type;
        }

        $response = $this->api->request(sprintf('series/%s/artworks', $seriesId), $query);

        return new SeriesArtworksResponse($response);
    }
}
