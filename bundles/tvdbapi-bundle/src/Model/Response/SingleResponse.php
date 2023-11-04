<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Response;

use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\BaseSchema;

abstract class SingleResponse extends BaseResponse
{
    public function getResult(): ?BaseSchema
    {
        $schemaClass = $this->getSchemaClass();
        if (class_exists($schemaClass)) {
            return new $schemaClass($this->getApiResponse()->getData());
        }

        return null;
    }
}
