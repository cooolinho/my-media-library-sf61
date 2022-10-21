<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Schema;

class SearchResult extends BaseSchema
{
    public array $aliases = [];
    public array $companies = [];
    public string $companyType = '';
    public string $country = '';
    public string $director = '';
    public string $first_air_time = '';
    public array $genres = [];
    public string $id = '';
    public string $image_url = '';
    public string $name = '';
    public bool $is_official;
    public string $name_translated = '';
    public string $network = '';
    public string $objectID = '';
    public string $officialList = '';
    public string $overview = '';
    public array $overviews = [];
    public array $overview_translated = [];
    public string $poster = '';
    public array $posters = [];
    public string $primary_language = '';
    public array $remote_ids = [];
    public string $status = '';
    public string $slug = '';
    public array $studios = [];
    public string $title = '';
    public string $thumbnail = '';
    public array $translations = [];
    public array $translationsWithLang = [];
    public string $tvdb_id = '';
    public string $type = '';
    public string $year = '';

    public function getAliases(): array
    {
        return $this->aliases;
    }

    public function setAliases(array $aliases): SearchResult
    {
        $this->aliases = $aliases;

        return $this;
    }

    public function getCompanies(): array
    {
        return $this->companies;
    }

    public function setCompanies(array $companies): SearchResult
    {
        $this->companies = $companies;

        return $this;
    }

    public function getCompanyType(): string
    {
        return $this->companyType;
    }

    public function setCompanyType(string $companyType): SearchResult
    {
        $this->companyType = $companyType;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): SearchResult
    {
        $this->country = $country;

        return $this;
    }

    public function getDirector(): string
    {
        return $this->director;
    }

    public function setDirector(string $director): SearchResult
    {
        $this->director = $director;

        return $this;
    }

    public function getFirstAirTime(): string
    {
        return $this->first_air_time;
    }

    public function setFirstAirTime(string $first_air_time): SearchResult
    {
        $this->first_air_time = $first_air_time;

        return $this;
    }

    public function getGenres(): array
    {
        return $this->genres;
    }

    public function setGenres(array $genres): SearchResult
    {
        $this->genres = $genres;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): SearchResult
    {
        $this->id = $id;

        return $this;
    }

    public function getImageUrl(): string
    {
        return $this->image_url;
    }

    public function setImageUrl(string $image_url): SearchResult
    {
        $this->image_url = $image_url;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): SearchResult
    {
        $this->name = $name;

        return $this;
    }

    public function isIsOfficial(): bool
    {
        return $this->is_official;
    }

    public function setIsOfficial(bool $is_official): SearchResult
    {
        $this->is_official = $is_official;

        return $this;
    }

    public function getNameTranslated(): string
    {
        return $this->name_translated;
    }

    public function setNameTranslated(string $name_translated): SearchResult
    {
        $this->name_translated = $name_translated;

        return $this;
    }

    public function getNetwork(): string
    {
        return $this->network;
    }

    public function setNetwork(string $network): SearchResult
    {
        $this->network = $network;

        return $this;
    }

    public function getObjectID(): string
    {
        return $this->objectID;
    }

    public function setObjectID(string $objectID): SearchResult
    {
        $this->objectID = $objectID;

        return $this;
    }

    public function getOfficialList(): string
    {
        return $this->officialList;
    }

    public function setOfficialList(string $officialList): SearchResult
    {
        $this->officialList = $officialList;

        return $this;
    }

    public function getOverview(): string
    {
        return $this->overview;
    }

    public function setOverview(string $overview): SearchResult
    {
        $this->overview = $overview;

        return $this;
    }

    public function getOverviews(): array
    {
        return $this->overviews;
    }

    public function setOverviews(array $overviews): SearchResult
    {
        $this->overviews = $overviews;

        return $this;
    }

    public function getOverviewTranslated(): array
    {
        return $this->overview_translated;
    }

    public function setOverviewTranslated(array $overview_translated): SearchResult
    {
        $this->overview_translated = $overview_translated;

        return $this;
    }

    public function getPoster(): string
    {
        return $this->poster;
    }

    public function setPoster(string $poster): SearchResult
    {
        $this->poster = $poster;

        return $this;
    }

    public function getPosters(): array
    {
        return $this->posters;
    }

    public function setPosters(array $posters): SearchResult
    {
        $this->posters = $posters;

        return $this;
    }

    public function getPrimaryLanguage(): string
    {
        return $this->primary_language;
    }

    public function setPrimaryLanguage(string $primary_language): SearchResult
    {
        $this->primary_language = $primary_language;

        return $this;
    }

    public function getRemoteIds(): array
    {
        return $this->remote_ids;
    }

    public function setRemoteIds(array $remote_ids): SearchResult
    {
        $this->remote_ids = $remote_ids;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): SearchResult
    {
        $this->status = $status;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): SearchResult
    {
        $this->slug = $slug;

        return $this;
    }

    public function getStudios(): array
    {
        return $this->studios;
    }

    public function setStudios(array $studios): SearchResult
    {
        $this->studios = $studios;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): SearchResult
    {
        $this->title = $title;

        return $this;
    }

    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(string $thumbnail): SearchResult
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getTranslations(): array
    {
        return $this->translations;
    }

    public function setTranslations(array $translations): SearchResult
    {
        $this->translations = $translations;

        return $this;
    }

    public function getTranslation(string $locale): string
    {
        return $this->translations[$locale] ?? $this->name;
    }

    public function getTranslationsWithLang(): array
    {
        return $this->translationsWithLang;
    }

    public function setTranslationsWithLang(array $translationsWithLang): SearchResult
    {
        $this->translationsWithLang = $translationsWithLang;

        return $this;
    }

    public function getTvdbId(): string
    {
        return $this->tvdb_id;
    }

    public function setTvdbId(string $tvdb_id): SearchResult
    {
        $this->tvdb_id = $tvdb_id;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): SearchResult
    {
        $this->type = $type;

        return $this;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function setYear(string $year): SearchResult
    {
        $this->year = $year;

        return $this;
    }
}
