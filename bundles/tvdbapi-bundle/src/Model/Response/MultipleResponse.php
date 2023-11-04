<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Response;

abstract class MultipleResponse extends BaseResponse
{
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
