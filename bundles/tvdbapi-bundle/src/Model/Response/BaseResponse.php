<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Response;

abstract class BaseResponse
{
    public function __construct(protected ApiResponse $response)
    {
    }

    abstract protected function getSchemaClass(): string;

    public function getApiResponse(): ApiResponse
    {
        return $this->response;
    }
}
