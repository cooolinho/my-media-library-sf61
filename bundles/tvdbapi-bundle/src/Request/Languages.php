<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Request;

use Cooolinho\Bundle\TVDBApiBundle\Model\Response\LanguagesResponse;

class Languages extends BaseRequest
{
    const DEU = 'deu';
    const ENG = 'eng';

    /**
     * @note https://thetvdb.github.io/v4-api/#/Languages/getAllLanguages
     *
     * @return LanguagesResponse
     */
    public function getAllLanguages(): LanguagesResponse
    {
        return new LanguagesResponse($this->api->request('languages'));
    }
}
