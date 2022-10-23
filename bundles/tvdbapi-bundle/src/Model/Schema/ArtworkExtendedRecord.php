<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Schema;

class ArtworkExtendedRecord extends BaseSchema
{
    public int $episodeId = 0;
    public int $height = 0;
    public int $id = 0;
    public string $image = '';
    public string $language = '';
    public int $movieId = 0;
    public int $networkId = 0;
    public int $peopleId = 0;
    public float $score = 0;
    public int $seasonId = 0;
    public int $seriesId = 0;
    public int $seriesPeopleId = 0;
    public array $status = [];
    public array $tagOptions = [];
    public string $thumbnail = '';
    public int $thumbnailHeight = 0;
    public int $thumbnailWidth = 0;
    public int $type = 0;
    public int $updatedAt = 0;
    public int $width = 0;

    /**
     * @return int
     */
    public function getEpisodeId(): int
    {
        return $this->episodeId;
    }

    /**
     * @param int $episodeId
     * @return ArtworkExtendedRecord
     */
    public function setEpisodeId(int $episodeId): ArtworkExtendedRecord
    {
        $this->episodeId = $episodeId;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return ArtworkExtendedRecord
     */
    public function setHeight(int $height): ArtworkExtendedRecord
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ArtworkExtendedRecord
     */
    public function setId(int $id): ArtworkExtendedRecord
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return ArtworkExtendedRecord
     */
    public function setImage(string $image): ArtworkExtendedRecord
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return ArtworkExtendedRecord
     */
    public function setLanguage(string $language): ArtworkExtendedRecord
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return int
     */
    public function getMovieId(): int
    {
        return $this->movieId;
    }

    /**
     * @param int $movieId
     * @return ArtworkExtendedRecord
     */
    public function setMovieId(int $movieId): ArtworkExtendedRecord
    {
        $this->movieId = $movieId;
        return $this;
    }

    /**
     * @return int
     */
    public function getNetworkId(): int
    {
        return $this->networkId;
    }

    /**
     * @param int $networkId
     * @return ArtworkExtendedRecord
     */
    public function setNetworkId(int $networkId): ArtworkExtendedRecord
    {
        $this->networkId = $networkId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPeopleId(): int
    {
        return $this->peopleId;
    }

    /**
     * @param int $peopleId
     * @return ArtworkExtendedRecord
     */
    public function setPeopleId(int $peopleId): ArtworkExtendedRecord
    {
        $this->peopleId = $peopleId;
        return $this;
    }

    /**
     * @return float
     */
    public function getScore(): float
    {
        return $this->score;
    }

    /**
     * @param float $score
     * @return ArtworkExtendedRecord
     */
    public function setScore(float $score): ArtworkExtendedRecord
    {
        $this->score = $score;
        return $this;
    }

    /**
     * @return int
     */
    public function getSeasonId(): int
    {
        return $this->seasonId;
    }

    /**
     * @param int $seasonId
     * @return ArtworkExtendedRecord
     */
    public function setSeasonId(int $seasonId): ArtworkExtendedRecord
    {
        $this->seasonId = $seasonId;
        return $this;
    }

    /**
     * @return int
     */
    public function getSeriesId(): int
    {
        return $this->seriesId;
    }

    /**
     * @param int $seriesId
     * @return ArtworkExtendedRecord
     */
    public function setSeriesId(int $seriesId): ArtworkExtendedRecord
    {
        $this->seriesId = $seriesId;
        return $this;
    }

    /**
     * @return int
     */
    public function getSeriesPeopleId(): int
    {
        return $this->seriesPeopleId;
    }

    /**
     * @param int $seriesPeopleId
     * @return ArtworkExtendedRecord
     */
    public function setSeriesPeopleId(int $seriesPeopleId): ArtworkExtendedRecord
    {
        $this->seriesPeopleId = $seriesPeopleId;
        return $this;
    }

    /**
     * @return array
     */
    public function getStatus(): array
    {
        return $this->status;
    }

    /**
     * @param array $status
     * @return ArtworkExtendedRecord
     */
    public function setStatus(array $status): ArtworkExtendedRecord
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return array
     */
    public function getTagOptions(): array
    {
        return $this->tagOptions;
    }

    /**
     * @param array $tagOptions
     * @return ArtworkExtendedRecord
     */
    public function setTagOptions(array $tagOptions): ArtworkExtendedRecord
    {
        $this->tagOptions = $tagOptions;
        return $this;
    }

    /**
     * @return string
     */
    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }

    /**
     * @param string $thumbnail
     * @return ArtworkExtendedRecord
     */
    public function setThumbnail(string $thumbnail): ArtworkExtendedRecord
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @return int
     */
    public function getThumbnailHeight(): int
    {
        return $this->thumbnailHeight;
    }

    /**
     * @param int $thumbnailHeight
     * @return ArtworkExtendedRecord
     */
    public function setThumbnailHeight(int $thumbnailHeight): ArtworkExtendedRecord
    {
        $this->thumbnailHeight = $thumbnailHeight;
        return $this;
    }

    /**
     * @return int
     */
    public function getThumbnailWidth(): int
    {
        return $this->thumbnailWidth;
    }

    /**
     * @param int $thumbnailWidth
     * @return ArtworkExtendedRecord
     */
    public function setThumbnailWidth(int $thumbnailWidth): ArtworkExtendedRecord
    {
        $this->thumbnailWidth = $thumbnailWidth;
        return $this;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return ArtworkExtendedRecord
     */
    public function setType(int $type): ArtworkExtendedRecord
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    /**
     * @param int $updatedAt
     * @return ArtworkExtendedRecord
     */
    public function setUpdatedAt(int $updatedAt): ArtworkExtendedRecord
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return ArtworkExtendedRecord
     */
    public function setWidth(int $width): ArtworkExtendedRecord
    {
        $this->width = $width;
        return $this;
    }


}
