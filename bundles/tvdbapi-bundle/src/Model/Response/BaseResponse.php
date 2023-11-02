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

    public function getResults(): array
    {
        $results = [];
        $schemaClass = $this->getSchemaClass();
        if (class_exists($schemaClass)) {
            foreach ($this->getApiResponse()->getData() as $data) {
                $results[] = new $schemaClass($data);
            }
        }

        return $results;
    }
}
