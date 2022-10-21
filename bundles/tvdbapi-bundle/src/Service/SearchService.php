<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Service;

use Cooolinho\Bundle\TVDBApiBundle\Model\Response\SearchResponse;

class SearchService extends AbstractService
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
