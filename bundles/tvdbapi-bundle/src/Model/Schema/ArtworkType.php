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

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return ArtworkType
     */
    public function setHeight(int $height): ArtworkType
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
     * @return ArtworkType
     */
    public function setId(int $id): ArtworkType
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageFormat(): string
    {
        return $this->imageFormat;
    }

    /**
     * @param string $imageFormat
     * @return ArtworkType
     */
    public function setImageFormat(string $imageFormat): ArtworkType
    {
        $this->imageFormat = $imageFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ArtworkType
     */
    public function setName(string $name): ArtworkType
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getRecordType(): string
    {
        return $this->recordType;
    }

    /**
     * @param string $recordType
     * @return ArtworkType
     */
    public function setRecordType(string $recordType): ArtworkType
    {
        $this->recordType = $recordType;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return ArtworkType
     */
    public function setSlug(string $slug): ArtworkType
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return int
     */
    public function getThumbHeight(): int
    {
        return $this->thumbHeight;
    }

    /**
     * @param int $thumbHeight
     * @return ArtworkType
     */
    public function setThumbHeight(int $thumbHeight): ArtworkType
    {
        $this->thumbHeight = $thumbHeight;
        return $this;
    }

    /**
     * @return int
     */
    public function getThumbWidth(): int
    {
        return $this->thumbWidth;
    }

    /**
     * @param int $thumbWidth
     * @return ArtworkType
     */
    public function setThumbWidth(int $thumbWidth): ArtworkType
    {
        $this->thumbWidth = $thumbWidth;
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
     * @return ArtworkType
     */
    public function setWidth(int $width): ArtworkType
    {
        $this->width = $width;
        return $this;
    }
}
