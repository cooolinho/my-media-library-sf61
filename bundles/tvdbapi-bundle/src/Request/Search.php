<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Request;

use Cooolinho\Bundle\TVDBApiBundle\Model\Response\SearchResponse;

class Search extends BaseRequest
{
    /**
     * @note https://thetvdb.github.io/v4-api/#/Search/getSearchResults
     *
     * @param string $query
     * @param string|null $type
     * @param string $language
     * @param int $limit
     * @return SearchResponse
     */
    public function getSearchResults(
        string $query,
        string $type = null,
        string $language = Languages::DEU,
        int    $limit = 100,
    ): SearchResponse
    {
        return new SearchResponse($this->api->request('search', [
            'query' => $query,
            'type' => $type,
            'language' => $language,
            'limit' => $limit,
        ]));
    }
}
