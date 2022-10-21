<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Service;

use Cooolinho\Bundle\TVDBApiBundle\Api\ApiInterface;

abstract class AbstractService
{
    protected ApiInterface $api;

    public function __construct(ApiInterface $api)
    {
        $this->api = $api;
    }
}
