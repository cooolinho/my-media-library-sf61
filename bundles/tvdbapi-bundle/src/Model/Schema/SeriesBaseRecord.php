<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Schema;

use Doctrine\Common\Collections\ArrayCollection;

class SeriesBaseRecord extends BaseSchema
{
    public array $aliases = [];
    public int $averageRuntime = 0;
    public string $country;
    public int $defaultSeasonType = 0;
    public array $episodes = [];
    public string $firstAired;
    public int $id = 0;
    public string $image = '';
    public bool $isOrderRandomized = false;
    public string $lastAired = '';
    public string $lastUpdated = '';
    public string $name = '';
    public array $nameTranslations = [];
    public string $nextAired = '';
    public string $originalCountry = '';
    public string $originalLanguage = '';
    public array $overviewTranslations = [];
    public float $score = 0;
    public string $slug = '';
    public array $status = [];
    public string $year = '';

    public function getAliases(): array
    {
        return $this->aliases;
    }

    public function setAliases(array $aliases): SeriesBaseRecord
    {
        $this->aliases = $aliases;

        return $this;
    }

    public function getAverageRuntime(): int
    {
        return $this->averageRuntime;
    }

    public function setAverageRuntime(int $averageRuntime): SeriesBaseRecord
    {
        $this->averageRuntime = $averageRuntime;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): SeriesBaseRecord
    {
        $this->country = $country;

        return $this;
    }

    public function getDefaultSeasonType(): int
    {
        return $this->defaultSeasonType;
    }

    public function setDefaultSeasonType(int $defaultSeasonType): SeriesBaseRecord
    {
        $this->defaultSeasonType = $defaultSeasonType;

        return $this;
    }

    /**
     * @return ArrayCollection<int, EpisodeBaseRecord>
     */
    public function getEpisodes(): ArrayCollection
    {
        $episodes = new ArrayCollection();

        foreach ($this->episodes as $episodeData) {
            $episodes->add(new EpisodeBaseRecord($episodeData));
        }

        return $episodes;
    }

    public function setEpisodes(array $episodes): SeriesBaseRecord
    {
        $this->episodes = $episodes;

        return $this;
    }

    public function getFirstAired(): string
    {
        return $this->firstAired;
    }

    public function setFirstAired(string $firstAired): SeriesBaseRecord
    {
        $this->firstAired = $firstAired;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): SeriesBaseRecord
    {
        $this->id = $id;

        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): SeriesBaseRecord
    {
        $this->image = $image;

        return $this;
    }

    public function isOrderRandomized(): bool
    {
        return $this->isOrderRandomized;
    }

    public function setIsOrderRandomized(bool $isOrderRandomized): SeriesBaseRecord
    {
        $this->isOrderRandomized = $isOrderRandomized;

        return $this;
    }

    public function getLastAired(): string
    {
        return $this->lastAired;
    }

    public function setLastAired(string $lastAired): SeriesBaseRecord
    {
        $this->lastAired = $lastAired;

        return $this;
    }

    public function getLastUpdated(): string
    {
        return $this->lastUpdated;
    }

    public function setLastUpdated(string $lastUpdated): SeriesBaseRecord
    {
        $this->lastUpdated = $lastUpdated;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): SeriesBaseRecord
    {
        $this->name = $name;

        return $this;
    }

    public function getNameTranslations(): array
    {
        return $this->nameTranslations;
    }

    public function setNameTranslations(array $nameTranslations): SeriesBaseRecord
    {
        $this->nameTranslations = $nameTranslations;

        return $this;
    }

    public function getNextAired(): string
    {
        return $this->nextAired;
    }

    public function setNextAired(string $nextAired): SeriesBaseRecord
    {
        $this->nextAired = $nextAired;

        return $this;
    }

    public function getOriginalCountry(): string
    {
        return $this->originalCountry;
    }

    public function setOriginalCountry(string $originalCountry): SeriesBaseRecord
    {
        $this->originalCountry = $originalCountry;

        return $this;
    }

    public function getOriginalLanguage(): string
    {
        return $this->originalLanguage;
    }

    public function setOriginalLanguage(string $originalLanguage): SeriesBaseRecord
    {
        $this->originalLanguage = $originalLanguage;

        return $this;
    }

    public function getOverviewTranslations(): array
    {
        return $this->overviewTranslations;
    }

    public function setOverviewTranslations(array $overviewTranslations): SeriesBaseRecord
    {
        $this->overviewTranslations = $overviewTranslations;

        return $this;
    }

    public function getScore(): float
    {
        return $this->score;
    }

    public function setScore(float $score): SeriesBaseRecord
    {
        $this->score = $score;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): SeriesBaseRecord
    {
        $this->slug = $slug;

        return $this;
    }

    public function getStatus(): Status
    {
        return new Status($this->status);
    }

    public function setStatus(array $status): SeriesBaseRecord
    {
        $this->status = $status;

        return $this;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function setYear(string $year): SeriesBaseRecord
    {
        $this->year = $year;

        return $this;
    }
}
