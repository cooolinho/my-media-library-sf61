<?php

namespace Cooolinho\Bundle\TVDBApiBundle\Api;

use Cooolinho\Bundle\TVDBApiBundle\Model\Response\ApiResponse;
use Symfony\Component\HttpFoundation\Request;

interface ApiInterface
{
    public function request(string $path, array $query = [], string $method = Request::METHOD_GET): ApiResponse;
}
