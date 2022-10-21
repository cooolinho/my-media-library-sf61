<?php declare(strict_types=1);

namespace App\Service\TheTVDB;

use App\Service\ApiServiceInterface;

abstract class AbstractApiService
{
    protected ApiServiceInterface $api;

    public function __construct(ApiServiceInterface $api)
    {
        $this->api = $api;
    }
}
