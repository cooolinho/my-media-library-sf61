<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Request;

use Cooolinho\Bundle\TVDBApiBundle\Api\ApiInterface;

abstract class BaseRequest
{
    public function __construct(protected ApiInterface $api)
    {
    }
}
