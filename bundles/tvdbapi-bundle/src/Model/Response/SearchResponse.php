<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Response;

use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\SearchResult;

class SearchResponse
{
    protected ApiResponse $response;

    public function __construct(ApiResponse $response)
    {
        $this->response = $response;
    }

    public function getResults(): array
    {
        $results = [];
        foreach ($this->response->getData() as $searchResultData) {
            $results[] = new SearchResult($searchResultData);
        }

        return $results;
    }
}
