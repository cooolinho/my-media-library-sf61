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

    public function getEpisodeId(): int
    {
        return $this->episodeId;
    }

    public function setEpisodeId(int $episodeId): ArtworkExtendedRecord
    {
        $this->episodeId = $episodeId;

        return $this;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): ArtworkExtendedRecord
    {
        $this->height = $height;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): ArtworkExtendedRecord
    {
        $this->id = $id;

        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): ArtworkExtendedRecord
    {
        $this->image = $image;

        return $this;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): ArtworkExtendedRecord
    {
        $this->language = $language;

        return $this;
    }

    public function getMovieId(): int
    {
        return $this->movieId;
    }

    public function setMovieId(int $movieId): ArtworkExtendedRecord
    {
        $this->movieId = $movieId;

        return $this;
    }

    public function getNetworkId(): int
    {
        return $this->networkId;
    }

    public function setNetworkId(int $networkId): ArtworkExtendedRecord
    {
        $this->networkId = $networkId;

        return $this;
    }

    public function getPeopleId(): int
    {
        return $this->peopleId;
    }

    public function setPeopleId(int $peopleId): ArtworkExtendedRecord
    {
        $this->peopleId = $peopleId;

        return $this;
    }

    public function getScore(): float
    {
        return $this->score;
    }

    public function setScore(float $score): ArtworkExtendedRecord
    {
        $this->score = $score;

        return $this;
    }

    public function getSeasonId(): int
    {
        return $this->seasonId;
    }

    public function setSeasonId(int $seasonId): ArtworkExtendedRecord
    {
        $this->seasonId = $seasonId;

        return $this;
    }

    public function getSeriesId(): int
    {
        return $this->seriesId;
    }

    public function setSeriesId(int $seriesId): ArtworkExtendedRecord
    {
        $this->seriesId = $seriesId;

        return $this;
    }

    public function getSeriesPeopleId(): int
    {
        return $this->seriesPeopleId;
    }

    public function setSeriesPeopleId(int $seriesPeopleId): ArtworkExtendedRecord
    {
        $this->seriesPeopleId = $seriesPeopleId;

        return $this;
    }

    public function getStatus(): array
    {
        return $this->status;
    }

    public function setStatus(array $status): ArtworkExtendedRecord
    {
        $this->status = $status;

        return $this;
    }

    public function getTagOptions(): array
    {
        return $this->tagOptions;
    }

    public function setTagOptions(array $tagOptions): ArtworkExtendedRecord
    {
        $this->tagOptions = $tagOptions;

        return $this;
    }

    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(string $thumbnail): ArtworkExtendedRecord
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getThumbnailHeight(): int
    {
        return $this->thumbnailHeight;
    }

    public function setThumbnailHeight(int $thumbnailHeight): ArtworkExtendedRecord
    {
        $this->thumbnailHeight = $thumbnailHeight;

        return $this;
    }

    public function getThumbnailWidth(): int
    {
        return $this->thumbnailWidth;
    }

    public function setThumbnailWidth(int $thumbnailWidth): ArtworkExtendedRecord
    {
        $this->thumbnailWidth = $thumbnailWidth;

        return $this;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): ArtworkExtendedRecord
    {
        $this->type = $type;

        return $this;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): ArtworkExtendedRecord
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): ArtworkExtendedRecord
    {
        $this->width = $width;

        return $this;
    }
}
