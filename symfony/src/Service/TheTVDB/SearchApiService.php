<?php declare(strict_types=1);

namespace App\Service\TheTVDB;

use App\Model\TheTVDB\Response\SearchResponse;

class SearchApiService extends AbstractApiService
{
    public function search(string $query, string $type, int $limit = 100): SearchResponse
    {
        $response = $this->api->request('search', [
            'query' => $query,
            'type' => $type,
            'limit' => $limit,
        ]);

        return new SearchResponse($response);
    }
}
