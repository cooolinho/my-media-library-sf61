<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Request;

use Cooolinho\Bundle\TVDBApiBundle\Model\Response\EpisodeBaseRecordResponse;

class Episodes extends BaseRequest
{
    public function getEpisodeBase(int $episodeId, bool $translate = true): EpisodeBaseRecordResponse
    {
        $episodeResponse = $this->api->request(sprintf('episodes/%s', $episodeId));

        if ($translate) {
            $translations = $this->getEpisodeTranslation($episodeId);
        } else {
            $translations = [];
        }

        return new EpisodeBaseRecordResponse($episodeResponse, $translations);
    }

    public function getEpisodeTranslation(int $episodeId, string $lang = Languages::DEU): array
    {
        return $this->api->request(sprintf('episodes/%s/translations/%s', $episodeId, $lang))->getData();
    }
}
