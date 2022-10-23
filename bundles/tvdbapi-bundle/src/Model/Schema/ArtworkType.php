<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Schema;

class ArtworkType extends BaseSchema
{
    public const ACTOR = 'actor';
    public const AWARD = 'award';
    public const COMPANY = 'company';
    public const EPISODE = 'episode';
    public const LIST = 'list';
    public const MOVIE = 'movie';
    public const SEASON = 'season';
    public const SERIES = 'series';

    public const ACTOR_PHOTO = 13;
    public const AWARD_ICON = 26;
    public const COMPANY_ICON = 19;
    public const EPISODE_16_9_SCREENCAP = 11;
    public const EPISODE_4_3_SCREENCAP = 12;
    public const LIST_POSTER = 27;
    public const MOVIE_BANNER = 16;
    public const MOVIE_CINEMAGRAPH = 21;
    public const MOVIE_CLEARART = 24;
    public const MOVIE_CLEARLOGO = 25;
    public const MOVIE_ICON = 18;
    public const MOVIE_POSTER = 14;
    public const SEASON_BACKGROUND = 8;
    public const SEASON_BANNER = 6;
    public const SEASON_ICON = 10;
    public const SEASON_POSTER = 7;
    public const SERIES_BACKGROUND = 3;
    public const SERIES_BANNER = 1;
    public const SERIES_CINEMAGRAPH = 20;
    public const SERIES_CLEARART = 22;
    public const SERIES_CLEARLOGO = 23;
    public const SERIES_ICON = 5;
    public const SERIES_POSTER = 2;

    public int $height = 0;
    public int $id = 0;
    public string $imageFormat = '';
    public string $name = '';
    public string $recordType = '';
    public string $slug = '';
    public int $thumbHeight = 0;
    public int $thumbWidth = 0;
    public int $width = 0;

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): ArtworkType
    {
        $this->height = $height;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): ArtworkType
    {
        $this->id = $id;

        return $this;
    }

    public function getImageFormat(): string
    {
        return $this->imageFormat;
    }

    public function setImageFormat(string $imageFormat): ArtworkType
    {
        $this->imageFormat = $imageFormat;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ArtworkType
    {
        $this->name = $name;

        return $this;
    }

    public function getRecordType(): string
    {
        return $this->recordType;
    }

    public function setRecordType(string $recordType): ArtworkType
    {
        $this->recordType = $recordType;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): ArtworkType
    {
        $this->slug = $slug;

        return $this;
    }

    public function getThumbHeight(): int
    {
        return $this->thumbHeight;
    }

    public function setThumbHeight(int $thumbHeight): ArtworkType
    {
        $this->thumbHeight = $thumbHeight;

        return $this;
    }

    public function getThumbWidth(): int
    {
        return $this->thumbWidth;
    }

    public function setThumbWidth(int $thumbWidth): ArtworkType
    {
        $this->thumbWidth = $thumbWidth;

        return $this;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): ArtworkType
    {
        $this->width = $width;

        return $this;
    }
}
