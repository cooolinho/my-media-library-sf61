<?php declare(strict_types=1);

namespace App\Model\TheTVDB\Schema;

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

    /**
     * @return array
     */
    public function getAliases(): array
    {
        return $this->aliases;
    }

    /**
     * @param array $aliases
     * @return SearchResult
     */
    public function setAliases(array $aliases): SearchResult
    {
        $this->aliases = $aliases;
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
     * @return SearchResult
     */
    public function setCompanies(array $companies): SearchResult
    {
        $this->companies = $companies;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyType(): string
    {
        return $this->companyType;
    }

    /**
     * @param string $companyType
     * @return SearchResult
     */
    public function setCompanyType(string $companyType): SearchResult
    {
        $this->companyType = $companyType;
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
     * @return SearchResult
     */
    public function setCountry(string $country): SearchResult
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getDirector(): string
    {
        return $this->director;
    }

    /**
     * @param string $director
     * @return SearchResult
     */
    public function setDirector(string $director): SearchResult
    {
        $this->director = $director;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstAirTime(): string
    {
        return $this->first_air_time;
    }

    /**
     * @param string $first_air_time
     * @return SearchResult
     */
    public function setFirstAirTime(string $first_air_time): SearchResult
    {
        $this->first_air_time = $first_air_time;
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
     * @return SearchResult
     */
    public function setGenres(array $genres): SearchResult
    {
        $this->genres = $genres;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return SearchResult
     */
    public function setId(string $id): SearchResult
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->image_url;
    }

    /**
     * @param string $image_url
     * @return SearchResult
     */
    public function setImageUrl(string $image_url): SearchResult
    {
        $this->image_url = $image_url;
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
     * @return SearchResult
     */
    public function setName(string $name): SearchResult
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsOfficial(): bool
    {
        return $this->is_official;
    }

    /**
     * @param bool $is_official
     * @return SearchResult
     */
    public function setIsOfficial(bool $is_official): SearchResult
    {
        $this->is_official = $is_official;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameTranslated(): string
    {
        return $this->name_translated;
    }

    /**
     * @param string $name_translated
     * @return SearchResult
     */
    public function setNameTranslated(string $name_translated): SearchResult
    {
        $this->name_translated = $name_translated;
        return $this;
    }

    /**
     * @return string
     */
    public function getNetwork(): string
    {
        return $this->network;
    }

    /**
     * @param string $network
     * @return SearchResult
     */
    public function setNetwork(string $network): SearchResult
    {
        $this->network = $network;
        return $this;
    }

    /**
     * @return string
     */
    public function getObjectID(): string
    {
        return $this->objectID;
    }

    /**
     * @param string $objectID
     * @return SearchResult
     */
    public function setObjectID(string $objectID): SearchResult
    {
        $this->objectID = $objectID;
        return $this;
    }

    /**
     * @return string
     */
    public function getOfficialList(): string
    {
        return $this->officialList;
    }

    /**
     * @param string $officialList
     * @return SearchResult
     */
    public function setOfficialList(string $officialList): SearchResult
    {
        $this->officialList = $officialList;
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
     * @return SearchResult
     */
    public function setOverview(string $overview): SearchResult
    {
        $this->overview = $overview;
        return $this;
    }

    /**
     * @return array
     */
    public function getOverviews(): array
    {
        return $this->overviews;
    }

    /**
     * @param array $overviews
     * @return SearchResult
     */
    public function setOverviews(array $overviews): SearchResult
    {
        $this->overviews = $overviews;
        return $this;
    }

    /**
     * @return array
     */
    public function getOverviewTranslated(): array
    {
        return $this->overview_translated;
    }

    /**
     * @param array $overview_translated
     * @return SearchResult
     */
    public function setOverviewTranslated(array $overview_translated): SearchResult
    {
        $this->overview_translated = $overview_translated;
        return $this;
    }

    /**
     * @return string
     */
    public function getPoster(): string
    {
        return $this->poster;
    }

    /**
     * @param string $poster
     * @return SearchResult
     */
    public function setPoster(string $poster): SearchResult
    {
        $this->poster = $poster;
        return $this;
    }

    /**
     * @return array
     */
    public function getPosters(): array
    {
        return $this->posters;
    }

    /**
     * @param array $posters
     * @return SearchResult
     */
    public function setPosters(array $posters): SearchResult
    {
        $this->posters = $posters;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrimaryLanguage(): string
    {
        return $this->primary_language;
    }

    /**
     * @param string $primary_language
     * @return SearchResult
     */
    public function setPrimaryLanguage(string $primary_language): SearchResult
    {
        $this->primary_language = $primary_language;
        return $this;
    }

    /**
     * @return array
     */
    public function getRemoteIds(): array
    {
        return $this->remote_ids;
    }

    /**
     * @param array $remote_ids
     * @return SearchResult
     */
    public function setRemoteIds(array $remote_ids): SearchResult
    {
        $this->remote_ids = $remote_ids;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return SearchResult
     */
    public function setStatus(string $status): SearchResult
    {
        $this->status = $status;
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
     * @return SearchResult
     */
    public function setSlug(string $slug): SearchResult
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return array
     */
    public function getStudios(): array
    {
        return $this->studios;
    }

    /**
     * @param array $studios
     * @return SearchResult
     */
    public function setStudios(array $studios): SearchResult
    {
        $this->studios = $studios;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return SearchResult
     */
    public function setTitle(string $title): SearchResult
    {
        $this->title = $title;
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
     * @return SearchResult
     */
    public function setThumbnail(string $thumbnail): SearchResult
    {
        $this->thumbnail = $thumbnail;
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
     * @return SearchResult
     */
    public function setTranslations(array $translations): SearchResult
    {
        $this->translations = $translations;
        return $this;
    }

    /**
     * @param string $locale
     * @return string
     */
    public function getTranslation(string $locale): string
    {
        return $this->translations[$locale] ?? $this->name;
    }

    /**
     * @return array
     */
    public function getTranslationsWithLang(): array
    {
        return $this->translationsWithLang;
    }

    /**
     * @param array $translationsWithLang
     * @return SearchResult
     */
    public function setTranslationsWithLang(array $translationsWithLang): SearchResult
    {
        $this->translationsWithLang = $translationsWithLang;
        return $this;
    }

    /**
     * @return string
     */
    public function getTvdbId(): string
    {
        return $this->tvdb_id;
    }

    /**
     * @param string $tvdb_id
     * @return SearchResult
     */
    public function setTvdbId(string $tvdb_id): SearchResult
    {
        $this->tvdb_id = $tvdb_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return SearchResult
     */
    public function setType(string $type): SearchResult
    {
        $this->type = $type;
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
     * @return SearchResult
     */
    public function setYear(string $year): SearchResult
    {
        $this->year = $year;
        return $this;
    }
}
