<?php declare(strict_types=1);

namespace App\Model\TheTVDB\Schema;

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

    /**
     * @return string
     */
    public function getAired(): string
    {
        return $this->aired;
    }

    /**
     * @param string $aired
     * @return EpisodeBaseRecord
     */
    public function setAired(string $aired): EpisodeBaseRecord
    {
        $this->aired = $aired;
        return $this;
    }

    /**
     * @return int
     */
    public function getAirsAfterSeason(): int
    {
        return $this->airsAfterSeason;
    }

    /**
     * @param int $airsAfterSeason
     * @return EpisodeBaseRecord
     */
    public function setAirsAfterSeason(int $airsAfterSeason): EpisodeBaseRecord
    {
        $this->airsAfterSeason = $airsAfterSeason;
        return $this;
    }

    /**
     * @return int
     */
    public function getAirsBeforeEpisode(): int
    {
        return $this->airsBeforeEpisode;
    }

    /**
     * @param int $airsBeforeEpisode
     * @return EpisodeBaseRecord
     */
    public function setAirsBeforeEpisode(int $airsBeforeEpisode): EpisodeBaseRecord
    {
        $this->airsBeforeEpisode = $airsBeforeEpisode;
        return $this;
    }

    /**
     * @return int
     */
    public function getAirsBeforeSeason(): int
    {
        return $this->airsBeforeSeason;
    }

    /**
     * @param int $airsBeforeSeason
     * @return EpisodeBaseRecord
     */
    public function setAirsBeforeSeason(int $airsBeforeSeason): EpisodeBaseRecord
    {
        $this->airsBeforeSeason = $airsBeforeSeason;
        return $this;
    }

    /**
     * @return string
     */
    public function getFinaleType(): string
    {
        return $this->finaleType;
    }

    /**
     * @param string $finaleType
     * @return EpisodeBaseRecord
     */
    public function setFinaleType(string $finaleType): EpisodeBaseRecord
    {
        $this->finaleType = $finaleType;
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
     * @return EpisodeBaseRecord
     */
    public function setId(int $id): EpisodeBaseRecord
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
     * @return EpisodeBaseRecord
     */
    public function setImage(string $image): EpisodeBaseRecord
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return int
     */
    public function getImageType(): int
    {
        return $this->imageType;
    }

    /**
     * @param int $imageType
     * @return EpisodeBaseRecord
     */
    public function setImageType(int $imageType): EpisodeBaseRecord
    {
        $this->imageType = $imageType;
        return $this;
    }

    /**
     * @return int
     */
    public function getIsMovie(): int
    {
        return $this->isMovie;
    }

    /**
     * @param int $isMovie
     * @return EpisodeBaseRecord
     */
    public function setIsMovie(int $isMovie): EpisodeBaseRecord
    {
        $this->isMovie = $isMovie;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastUpdated(): string
    {
        return $this->lastUpdated;
    }

    /**
     * @param string $lastUpdated
     * @return EpisodeBaseRecord
     */
    public function setLastUpdated(string $lastUpdated): EpisodeBaseRecord
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }

    /**
     * @return int
     */
    public function getLinkedMovie(): int
    {
        return $this->linkedMovie;
    }

    /**
     * @param int $linkedMovie
     * @return EpisodeBaseRecord
     */
    public function setLinkedMovie(int $linkedMovie): EpisodeBaseRecord
    {
        $this->linkedMovie = $linkedMovie;
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
     * @return EpisodeBaseRecord
     */
    public function setName(string $name): EpisodeBaseRecord
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getNameTranslations(): array
    {
        return $this->nameTranslations;
    }

    /**
     * @param array $nameTranslations
     * @return EpisodeBaseRecord
     */
    public function setNameTranslations(array $nameTranslations): EpisodeBaseRecord
    {
        $this->nameTranslations = $nameTranslations;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return EpisodeBaseRecord
     */
    public function setNumber(int $number): EpisodeBaseRecord
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getOverview(): string
    {
        return $this->overview;
    }

    /**
     * @param string $overview
     * @return EpisodeBaseRecord
     */
    public function setOverview(string $overview): EpisodeBaseRecord
    {
        $this->overview = $overview;
        return $this;
    }

    /**
     * @return array
     */
    public function getOverviewTranslations(): array
    {
        return $this->overviewTranslations;
    }

    /**
     * @param array $overviewTranslations
     * @return EpisodeBaseRecord
     */
    public function setOverviewTranslations(array $overviewTranslations): EpisodeBaseRecord
    {
        $this->overviewTranslations = $overviewTranslations;
        return $this;
    }

    /**
     * @return int
     */
    public function getRuntime(): int
    {
        return $this->runtime;
    }

    /**
     * @param int $runtime
     * @return EpisodeBaseRecord
     */
    public function setRuntime(int $runtime): EpisodeBaseRecord
    {
        $this->runtime = $runtime;
        return $this;
    }

    /**
     * @return int
     */
    public function getSeasonNumber(): int
    {
        return $this->seasonNumber;
    }

    /**
     * @param int $seasonNumber
     * @return EpisodeBaseRecord
     */
    public function setSeasonNumber(int $seasonNumber): EpisodeBaseRecord
    {
        $this->seasonNumber = $seasonNumber;
        return $this;
    }

    /**
     * @return array
     */
    public function getSeasons(): array
    {
        return $this->seasons;
    }

    /**
     * @param array $seasons
     * @return EpisodeBaseRecord
     */
    public function setSeasons(array $seasons): EpisodeBaseRecord
    {
        $this->seasons = $seasons;
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
     * @return EpisodeBaseRecord
     */
    public function setSeriesId(int $seriesId): EpisodeBaseRecord
    {
        $this->seriesId = $seriesId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSeasonName(): string
    {
        return $this->seasonName;
    }

    /**
     * @param string $seasonName
     * @return EpisodeBaseRecord
     */
    public function setSeasonName(string $seasonName): EpisodeBaseRecord
    {
        $this->seasonName = $seasonName;
        return $this;
    }

    /**
     * @return string
     */
    public function getYear(): string
    {
        return $this->year;
    }

    /**
     * @param string $year
     * @return EpisodeBaseRecord
     */
    public function setYear(string $year): EpisodeBaseRecord
    {
        $this->year = $year;
        return $this;
    }
}
