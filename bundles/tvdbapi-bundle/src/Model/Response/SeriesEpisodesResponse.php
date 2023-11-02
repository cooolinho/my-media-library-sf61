<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Response;

use Cooolinho\Bundle\TVDBApiBundle\Model\Response\Traits\UseLinksTrait;
use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\SeriesBaseRecord;
use Doctrine\Common\Collections\ArrayCollection;

class SeriesEpisodesResponse extends BaseResponse
{
    use UseLinksTrait;

    protected ApiResponse $response;

    public function __construct(ApiResponse $response)
    {
        $this->response = $response;
        if ($response->getOriginalResponse()) {
            $this->setLinks($response->getOriginalResponse());
        }
    }

    public function getSeries(): SeriesBaseRecord
    {
        return new SeriesBaseRecord($this->response->getData());
    }

    public function getEpisodes(): ArrayCollection
    {
        return $this->getSeries()->getEpisodes();
    }

    protected function getSchemaClass(): string
    {
        return SeriesBaseRecord::class;
    }
}
