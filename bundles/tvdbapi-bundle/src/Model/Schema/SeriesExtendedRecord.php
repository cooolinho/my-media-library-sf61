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

    /**
     * @return string
     */
    public function getAbbreviation(): string
    {
        return $this->abbreviation;
    }

    /**
     * @param string $abbreviation
     * @return self
     */
    public function setAbbreviation(string $abbreviation): self
    {
        $this->abbreviation = $abbreviation;
        return $this;
    }

    /**
     * @return array
     */
    public function getAirsDays(): array
    {
        return $this->airsDays;
    }

    /**
     * @param array $airsDays
     * @return self
     */
    public function setAirsDays(array $airsDays): self
    {
        $this->airsDays = $airsDays;
        return $this;
    }

    /**
     * @return string
     */
    public function getAirsTime(): string
    {
        return $this->airsTime;
    }

    /**
     * @param string $airsTime
     * @return self
     */
    public function setAirsTime(string $airsTime): self
    {
        $this->airsTime = $airsTime;
        return $this;
    }

    /**
     * @return array
     */
    public function getAliases(): array
    {
        return $this->aliases;
    }

    /**
     * @param array $aliases
     * @return self
     */
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

    /**
     * @param array $artworks
     * @return self
     */
    public function setArtworks(array $artworks): self
    {
        $this->artworks = $artworks;
        return $this;
    }

    /**
     * @return int
     */
    public function getAverageRuntime(): int
    {
        return $this->averageRuntime;
    }

    /**
     * @param int $averageRuntime
     * @return self
     */
    public function setAverageRuntime(int $averageRuntime): self
    {
        $this->averageRuntime = $averageRuntime;
        return $this;
    }

    /**
     * @return array
     */
    public function getCharacters(): array
    {
        return $this->characters;
    }

    /**
     * @param array $characters
     * @return self
     */
    public function setCharacters(array $characters): self
    {
        $this->characters = $characters;
        return $this;
    }

    /**
     * @return array
     */
    public function getContentRatings(): array
    {
        return $this->contentRatings;
    }

    /**
     * @param array $contentRatings
     * @return self
     */
    public function setContentRatings(array $contentRatings): self
    {
        $this->contentRatings = $contentRatings;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return self
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return int
     */
    public function getDefaultSeasonTyp(): int
    {
        return $this->defaultSeasonTyp;
    }

    /**
     * @param int $defaultSeasonTyp
     * @return self
     */
    public function setDefaultSeasonTyp(int $defaultSeasonTyp): self
    {
        $this->defaultSeasonTyp = $defaultSeasonTyp;
        return $this;
    }

    /**
     * @return array
     */
    public function getEpisodes(): array
    {
        return $this->episodes;
    }

    /**
     * @param array $episodes
     * @return self
     */
    public function setEpisodes(array $episodes): self
    {
        $this->episodes = $episodes;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstAired(): string
    {
        return $this->firstAired;
    }

    /**
     * @param string $firstAired
     * @return self
     */
    public function setFirstAired(string $firstAired): self
    {
        $this->firstAired = $firstAired;
        return $this;
    }

    /**
     * @return array
     */
    public function getLists(): array
    {
        return $this->lists;
    }

    /**
     * @param array $lists
     * @return self
     */
    public function setLists(array $lists): self
    {
        $this->lists = $lists;
        return $this;
    }

    /**
     * @return array
     */
    public function getGenres(): array
    {
        return $this->genres;
    }

    /**
     * @param array $genres
     * @return self
     */
    public function setGenres(array $genres): self
    {
        $this->genres = $genres;
        return $this;
    }

    /**
     * @return int
     */
    public function getI(): int
    {
        return $this->i;
    }

    /**
     * @param int $i
     * @return self
     */
    public function setI(int $i): self
    {
        $this->i = $i;
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
     * @return self
     */
    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return bool
     */
    public function isOrderRandomized(): bool
    {
        return $this->isOrderRandomized;
    }

    /**
     * @param bool $isOrderRandomized
     * @return self
     */
    public function setIsOrderRandomized(bool $isOrderRandomized): self
    {
        $this->isOrderRandomized = $isOrderRandomized;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastAired(): string
    {
        return $this->lastAired;
    }

    /**
     * @param string $lastAired
     * @return self
     */
    public function setLastAired(string $lastAired): self
    {
        $this->lastAired = $lastAired;
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
     * @return self
     */
    public function setLastUpdated(string $lastUpdated): self
    {
        $this->lastUpdated = $lastUpdated;
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
     * @return self
     */
    public function setName(string $name): self
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
     * @return self
     */
    public function setNameTranslations(array $nameTranslations): self
    {
        $this->nameTranslations = $nameTranslations;
        return $this;
    }

    /**
     * @return array
     */
    public function getCompanies(): array
    {
        return $this->companies;
    }

    /**
     * @param array $companies
     * @return self
     */
    public function setCompanies(array $companies): self
    {
        $this->companies = $companies;
        return $this;
    }

    /**
     * @return string
     */
    public function getNextAired(): string
    {
        return $this->nextAired;
    }

    /**
     * @param string $nextAired
     * @return self
     */
    public function setNextAired(string $nextAired): self
    {
        $this->nextAired = $nextAired;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalCountry(): string
    {
        return $this->originalCountry;
    }

    /**
     * @param string $originalCountry
     * @return self
     */
    public function setOriginalCountry(string $originalCountry): self
    {
        $this->originalCountry = $originalCountry;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalLanguage(): string
    {
        return $this->originalLanguage;
    }

    /**
     * @param string $originalLanguage
     * @return self
     */
    public function setOriginalLanguage(string $originalLanguage): self
    {
        $this->originalLanguage = $originalLanguage;
        return $this;
    }

    /**
     * @return array
     */
    public function getOriginalNetwork(): array
    {
        return $this->originalNetwork;
    }

    /**
     * @param array $originalNetwork
     * @return self
     */
    public function setOriginalNetwork(array $originalNetwork): self
    {
        $this->originalNetwork = $originalNetwork;
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
     * @return self
     */
    public function setOverview(string $overview): self
    {
        $this->overview = $overview;
        return $this;
    }

    /**
     * @return array
     */
    public function getLatestNetwork(): array
    {
        return $this->latestNetwork;
    }

    /**
     * @param array $latestNetwork
     * @return self
     */
    public function setLatestNetwork(array $latestNetwork): self
    {
        $this->latestNetwork = $latestNetwork;
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
     * @return self
     */
    public function setOverviewTranslations(array $overviewTranslations): self
    {
        $this->overviewTranslations = $overviewTranslations;
        return $this;
    }

    /**
     * @return array
     */
    public function getRemoteIds(): array
    {
        return $this->remoteIds;
    }

    /**
     * @param array $remoteIds
     * @return self
     */
    public function setRemoteIds(array $remoteIds): self
    {
        $this->remoteIds = $remoteIds;
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
     * @return self
     */
    public function setScore(float $score): self
    {
        $this->score = $score;
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
     * @return self
     */
    public function setSeasons(array $seasons): self
    {
        $this->seasons = $seasons;
        return $this;
    }

    /**
     * @return array
     */
    public function getSeasonTypes(): array
    {
        return $this->seasonTypes;
    }

    /**
     * @param array $seasonTypes
     * @return self
     */
    public function setSeasonTypes(array $seasonTypes): self
    {
        $this->seasonTypes = $seasonTypes;
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
     * @return self
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;
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
     * @return self
     */
    public function setStatus(array $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return self
     */
    public function setTags(array $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return array
     */
    public function getTrailers(): array
    {
        return $this->trailers;
    }

    /**
     * @param array $trailers
     * @return self
     */
    public function setTrailers(array $trailers): self
    {
        $this->trailers = $trailers;
        return $this;
    }

    /**
     * @return array
     */
    public function getTranslations(): array
    {
        return $this->translations;
    }

    /**
     * @param array $translations
     * @return self
     */
    public function setTranslations(array $translations): self
    {
        $this->translations = $translations;
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
     * @return self
     */
    public function setYear(string $year): self
    {
        $this->year = $year;
        return $this;
    }
}
