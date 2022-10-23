<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Schema;

use Doctrine\Common\Collections\ArrayCollection;

class SeriesExtendedRecord extends BaseSchema
{
    public string $abbreviation = '';
    public array $airsDays = [];
    public string $airsTime = '';
    public array $aliases = [];
    public array $artworks = [];
    public int $averageRuntime = 0;
    public array $characters = [];
    public array $contentRatings = [];
    public string $country = '';
    public int $defaultSeasonTyp = 0;
    public array $episodes = [];
    public string $firstAired = '';
    public array $lists = [];
    public array $genres = [];
    public int $id = 0;
    public string $image = '';
    public bool $isOrderRandomized;
    public string $lastAired = '';
    public string $lastUpdated = '';
    public string $name = '';
    public array $nameTranslations = [];
    public array $companies = [];
    public string $nextAired = '';
    public string $originalCountry = '';
    public string $originalLanguage = '';
    public array $originalNetwork = [];
    public string $overview = '';
    public array $latestNetwork = [];
    public array $overviewTranslations = [];
    public array $remoteIds = [];
    public float $score = 0;
    public array $seasons = [];
    public array $seasonTypes = [];
    public string $slug = '';
    public array $status = [];
    public array $tags = [];
    public array $trailers = [];
    public array $translations = [];
    public string $year = '';

    public function getAbbreviation(): string
    {
        return $this->abbreviation;
    }

    public function setAbbreviation(string $abbreviation): self
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    public function getAirsDays(): array
    {
        return $this->airsDays;
    }

    public function setAirsDays(array $airsDays): self
    {
        $this->airsDays = $airsDays;

        return $this;
    }

    public function getAirsTime(): string
    {
        return $this->airsTime;
    }

    public function setAirsTime(string $airsTime): self
    {
        $this->airsTime = $airsTime;

        return $this;
    }

    public function getAliases(): array
    {
        return $this->aliases;
    }

    public function setAliases(array $aliases): self
    {
        $this->aliases = $aliases;

        return $this;
    }

    /**
     * @return ArrayCollection<int, ArtworkExtendedRecord>
     */
    public function getArtworks(): ArrayCollection
    {
        $artworks = new ArrayCollection();
        foreach ($this->artworks as $artworkData) {
            $artworks->add(new ArtworkExtendedRecord($artworkData));
        }

        return $artworks;
    }

    public function setArtworks(array $artworks): self
    {
        $this->artworks = $artworks;

        return $this;
    }

    public function getAverageRuntime(): int
    {
        return $this->averageRuntime;
    }

    public function setAverageRuntime(int $averageRuntime): self
    {
        $this->averageRuntime = $averageRuntime;

        return $this;
    }

    public function getCharacters(): array
    {
        return $this->characters;
    }

    public function setCharacters(array $characters): self
    {
        $this->characters = $characters;

        return $this;
    }

    public function getContentRatings(): array
    {
        return $this->contentRatings;
    }

    public function setContentRatings(array $contentRatings): self
    {
        $this->contentRatings = $contentRatings;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getDefaultSeasonTyp(): int
    {
        return $this->defaultSeasonTyp;
    }

    public function setDefaultSeasonTyp(int $defaultSeasonTyp): self
    {
        $this->defaultSeasonTyp = $defaultSeasonTyp;

        return $this;
    }

    public function getEpisodes(): array
    {
        return $this->episodes;
    }

    public function setEpisodes(array $episodes): self
    {
        $this->episodes = $episodes;

        return $this;
    }

    public function getFirstAired(): string
    {
        return $this->firstAired;
    }

    public function setFirstAired(string $firstAired): self
    {
        $this->firstAired = $firstAired;

        return $this;
    }

    public function getLists(): array
    {
        return $this->lists;
    }

    public function setLists(array $lists): self
    {
        $this->lists = $lists;

        return $this;
    }

    public function getGenres(): array
    {
        return $this->genres;
    }

    public function setGenres(array $genres): self
    {
        $this->genres = $genres;

        return $this;
    }

    public function getI(): int
    {
        return $this->i;
    }

    public function setI(int $i): self
    {
        $this->i = $i;

        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function isOrderRandomized(): bool
    {
        return $this->isOrderRandomized;
    }

    public function setIsOrderRandomized(bool $isOrderRandomized): self
    {
        $this->isOrderRandomized = $isOrderRandomized;

        return $this;
    }

    public function getLastAired(): string
    {
        return $this->lastAired;
    }

    public function setLastAired(string $lastAired): self
    {
        $this->lastAired = $lastAired;

        return $this;
    }

    public function getLastUpdated(): string
    {
        return $this->lastUpdated;
    }

    public function setLastUpdated(string $lastUpdated): self
    {
        $this->lastUpdated = $lastUpdated;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNameTranslations(): array
    {
        return $this->nameTranslations;
    }

    public function setNameTranslations(array $nameTranslations): self
    {
        $this->nameTranslations = $nameTranslations;

        return $this;
    }

    public function getCompanies(): array
    {
        return $this->companies;
    }

    public function setCompanies(array $companies): self
    {
        $this->companies = $companies;

        return $this;
    }

    public function getNextAired(): string
    {
        return $this->nextAired;
    }

    public function setNextAired(string $nextAired): self
    {
        $this->nextAired = $nextAired;

        return $this;
    }

    public function getOriginalCountry(): string
    {
        return $this->originalCountry;
    }

    public function setOriginalCountry(string $originalCountry): self
    {
        $this->originalCountry = $originalCountry;

        return $this;
    }

    public function getOriginalLanguage(): string
    {
        return $this->originalLanguage;
    }

    public function setOriginalLanguage(string $originalLanguage): self
    {
        $this->originalLanguage = $originalLanguage;

        return $this;
    }

    public function getOriginalNetwork(): array
    {
        return $this->originalNetwork;
    }

    public function setOriginalNetwork(array $originalNetwork): self
    {
        $this->originalNetwork = $originalNetwork;

        return $this;
    }

    public function getOverview(): string
    {
        return $this->overview;
    }

    public function setOverview(string $overview): self
    {
        $this->overview = $overview;

        return $this;
    }

    public function getLatestNetwork(): array
    {
        return $this->latestNetwork;
    }

    public function setLatestNetwork(array $latestNetwork): self
    {
        $this->latestNetwork = $latestNetwork;

        return $this;
    }

    public function getOverviewTranslations(): array
    {
        return $this->overviewTranslations;
    }

    public function setOverviewTranslations(array $overviewTranslations): self
    {
        $this->overviewTranslations = $overviewTranslations;

        return $this;
    }

    public function getRemoteIds(): array
    {
        return $this->remoteIds;
    }

    public function setRemoteIds(array $remoteIds): self
    {
        $this->remoteIds = $remoteIds;

        return $this;
    }

    public function getScore(): float
    {
        return $this->score;
    }

    public function setScore(float $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getSeasons(): array
    {
        return $this->seasons;
    }

    public function setSeasons(array $seasons): self
    {
        $this->seasons = $seasons;

        return $this;
    }

    public function getSeasonTypes(): array
    {
        return $this->seasonTypes;
    }

    public function setSeasonTypes(array $seasonTypes): self
    {
        $this->seasonTypes = $seasonTypes;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getStatus(): array
    {
        return $this->status;
    }

    public function setStatus(array $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function getTrailers(): array
    {
        return $this->trailers;
    }

    public function setTrailers(array $trailers): self
    {
        $this->trailers = $trailers;

        return $this;
    }

    public function getTranslations(): array
    {
        return $this->translations;
    }

    public function setTranslations(array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }
}
