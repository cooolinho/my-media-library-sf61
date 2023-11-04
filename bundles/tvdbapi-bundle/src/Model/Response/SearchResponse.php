<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Response;

use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\SearchSchema;

class SearchResponse extends MultipleResponse
{
    protected function getSchemaClass(): string
    {
        return SearchSchema::class;
    }
}
