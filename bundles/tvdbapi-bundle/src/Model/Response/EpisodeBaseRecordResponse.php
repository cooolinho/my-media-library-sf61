<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Response;

use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\EpisodeBaseRecord;

class EpisodeBaseRecordResponse extends SingleResponse
{
    public function __construct(protected ApiResponse $response, private readonly array $translations = [])
    {
        parent::__construct($response);
    }

    protected function getSchemaClass(): string
    {
        return EpisodeBaseRecord::class;
    }

    /**
     * @return EpisodeBaseRecord|null
     */
    public function getEpisodeBaseRecord(): ?EpisodeBaseRecord
    {
        return new EpisodeBaseRecord(array_merge($this->getApiResponse()->getData(), $this->translations));
    }
}
