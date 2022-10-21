<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Schema;

class EpisodeBaseRecord extends BaseSchema
{
    public string $aired = '';
    public int $airsAfterSeason = 0;
    public int $airsBeforeEpisode = 0;
    public int $airsBeforeSeason = 0;
    public string $finaleType = '';
    public int $id = 0;
    public string $image = '';
    public int $imageType = 0;
    public int $isMovie = 0;
    public string $lastUpdated = '';
    public int $linkedMovie = 0;
    public string $name = '';
    public array $nameTranslations = [];
    public int $number = 0;
    public string $overview = '';
    public array $overviewTranslations = [];
    public int $runtime = 0;
    public int $seasonNumber = 0;
    public array $seasons = [];
    public int $seriesId = 0;
    public string $seasonName = '';
    public string $year = '';

    public function getAired(): string
    {
        return $this->aired;
    }

    public function setAired(string $aired): EpisodeBaseRecord
    {
        $this->aired = $aired;

        return $this;
    }

    public function getAirsAfterSeason(): int
    {
        return $this->airsAfterSeason;
    }

    public function setAirsAfterSeason(int $airsAfterSeason): EpisodeBaseRecord
    {
        $this->airsAfterSeason = $airsAfterSeason;

        return $this;
    }

    public function getAirsBeforeEpisode(): int
    {
        return $this->airsBeforeEpisode;
    }

    public function setAirsBeforeEpisode(int $airsBeforeEpisode): EpisodeBaseRecord
    {
        $this->airsBeforeEpisode = $airsBeforeEpisode;

        return $this;
    }

    public function getAirsBeforeSeason(): int
    {
        return $this->airsBeforeSeason;
    }

    public function setAirsBeforeSeason(int $airsBeforeSeason): EpisodeBaseRecord
    {
        $this->airsBeforeSeason = $airsBeforeSeason;

        return $this;
    }

    public function getFinaleType(): string
    {
        return $this->finaleType;
    }

    public function setFinaleType(string $finaleType): EpisodeBaseRecord
    {
        $this->finaleType = $finaleType;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): EpisodeBaseRecord
    {
        $this->id = $id;

        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): EpisodeBaseRecord
    {
        $this->image = $image;

        return $this;
    }

    public function getImageType(): int
    {
        return $this->imageType;
    }

    public function setImageType(int $imageType): EpisodeBaseRecord
    {
        $this->imageType = $imageType;

        return $this;
    }

    public function getIsMovie(): int
    {
        return $this->isMovie;
    }

    public function setIsMovie(int $isMovie): EpisodeBaseRecord
    {
        $this->isMovie = $isMovie;

        return $this;
    }

    public function getLastUpdated(): string
    {
        return $this->lastUpdated;
    }

    public function setLastUpdated(string $lastUpdated): EpisodeBaseRecord
    {
        $this->lastUpdated = $lastUpdated;

        return $this;
    }

    public function getLinkedMovie(): int
    {
        return $this->linkedMovie;
    }

    public function setLinkedMovie(int $linkedMovie): EpisodeBaseRecord
    {
        $this->linkedMovie = $linkedMovie;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): EpisodeBaseRecord
    {
        $this->name = $name;

        return $this;
    }

    public function getNameTranslations(): array
    {
        return $this->nameTranslations;
    }

    public function setNameTranslations(array $nameTranslations): EpisodeBaseRecord
    {
        $this->nameTranslations = $nameTranslations;

        return $this;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): EpisodeBaseRecord
    {
        $this->number = $number;

        return $this;
    }

    public function getOverview(): string
    {
        return $this->overview;
    }

    public function setOverview(string $overview): EpisodeBaseRecord
    {
        $this->overview = $overview;

        return $this;
    }

    public function getOverviewTranslations(): array
    {
        return $this->overviewTranslations;
    }

    public function setOverviewTranslations(array $overviewTranslations): EpisodeBaseRecord
    {
        $this->overviewTranslations = $overviewTranslations;

        return $this;
    }

    public function getRuntime(): int
    {
        return $this->runtime;
    }

    public function setRuntime(int $runtime): EpisodeBaseRecord
    {
        $this->runtime = $runtime;

        return $this;
    }

    public function getSeasonNumber(): int
    {
        return $this->seasonNumber;
    }

    public function setSeasonNumber(int $seasonNumber): EpisodeBaseRecord
    {
        $this->seasonNumber = $seasonNumber;

        return $this;
    }

    public function getSeasons(): array
    {
        return $this->seasons;
    }

    public function setSeasons(array $seasons): EpisodeBaseRecord
    {
        $this->seasons = $seasons;

        return $this;
    }

    public function getSeriesId(): int
    {
        return $this->seriesId;
    }

    public function setSeriesId(int $seriesId): EpisodeBaseRecord
    {
        $this->seriesId = $seriesId;

        return $this;
    }

    public function getSeasonName(): string
    {
        return $this->seasonName;
    }

    public function setSeasonName(string $seasonName): EpisodeBaseRecord
    {
        $this->seasonName = $seasonName;

        return $this;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function setYear(string $year): EpisodeBaseRecord
    {
        $this->year = $year;

        return $this;
    }
}
