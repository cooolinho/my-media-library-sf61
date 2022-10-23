<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Response;

use Cooolinho\Bundle\TVDBApiBundle\Model\Response\Traits\UseLinksTrait;
use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\ArtworkExtendedRecord;
use Cooolinho\Bundle\TVDBApiBundle\Model\Schema\SeriesExtendedRecord;
use Doctrine\Common\Collections\ArrayCollection;

class SeriesArtworksResponse
{
    use UseLinksTrait;

    protected ApiResponse $response;

    public function __construct(ApiResponse $response)
    {
        $this->response = $response;
    }

    public function getSeries(): SeriesExtendedRecord
    {
        return new SeriesExtendedRecord($this->response->getData());
    }

    public function getArtworks(): ArrayCollection
    {
        return $this->getSeries()->getArtworks();
    }

    public function getArtworksByType(int $type): ArrayCollection
    {
        return $this->getSeries()->getArtworks()->filter(function (ArtworkExtendedRecord $artwork) use ($type) {
            return $artwork->getType() === $type;
        });
    }

    public function getArtworksByTypes(array $types): ArrayCollection
    {
        return $this->getSeries()->getArtworks()->filter(function (ArtworkExtendedRecord $artwork) use ($types) {
            return in_array($artwork->getType(), $types, true);
        });
    }
}
