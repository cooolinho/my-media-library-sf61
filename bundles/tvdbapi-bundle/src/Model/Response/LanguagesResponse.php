<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Response;

use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\LanguageSchema;

class LanguagesResponse extends BaseResponse
{
    protected function getSchemaClass(): string
    {
        return LanguageSchema::class;
    }
}
