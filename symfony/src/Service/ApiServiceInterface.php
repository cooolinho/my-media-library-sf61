<?php

namespace App\Service;

use App\Model\TheTVDB\Response\ApiResponse;
use Symfony\Component\HttpFoundation\Request;

interface ApiServiceInterface
{
    public function request(string $path, array $query = [], string $method = Request::METHOD_GET): ApiResponse;
}
