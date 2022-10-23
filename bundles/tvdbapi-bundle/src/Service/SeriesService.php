<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Service;

use Cooolinho\Bundle\TVDBApiBundle\Model\Response\SeriesArtworksResponse;
use Cooolinho\Bundle\TVDBApiBundle\Model\Response\SeriesEpisodesResponse;

class SeriesService extends AbstractService
{
    public const SEASON_TYPE_OFFICIAL = 'official';
    public const SEASON_TYPE_ABSOLUTE = 'alternate';
    public const SEASON_TYPE_REGIONAL = 'regional';
    public const SEASON_TYPE_DVD = 'dvd';
    public const SEASON_TYPE_DEFAULT = 'default';

    public const LANG_DE = 'deu';
    public const LANG_EN = 'eng';

    public function getSeriesEpisodes(
        int $seriesId,
        string $seasonType = self::SEASON_TYPE_DEFAULT,
        string $lang = self::LANG_EN,
        int $page = 0
    ): SeriesEpisodesResponse {
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
