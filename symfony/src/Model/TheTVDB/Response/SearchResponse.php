<?php declare(strict_types=1);

namespace App\Model\TheTVDB\Response;

use App\Model\TheTVDB\Schema\SearchResult;

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
