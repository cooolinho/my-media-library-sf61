<?php declare(strict_types=1);

namespace App\Model\TheTVDB;

class Search
{
    public const TYPE_MOVIE = 'movie';
    public const TYPE_SERIES = 'series';
    public const TYPE_PERSON = 'person';
    public const TYPE_COMPANY = 'company';

    protected string $query;
    protected string $type = ''; // movie, series, person, or company.
    protected int $year;
    protected string $company;
    protected string $country;
    protected string $director;
    protected string $language;
    protected string $primaryType;
    protected string $network;
    protected string $remote_id;
    protected int $offset;
    protected int $limit;

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     * @return Search
     */
    public function setQuery(string $query): Search
    {
        $this->query = $query;
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
     * @return Search
     */
    public function setType(string $type): Search
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return Search
     */
    public function setYear(int $year): Search
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @param string $company
     * @return Search
     */
    public function setCompany(string $company): Search
    {
        $this->company = $company;
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
     * @return Search
     */
    public function setCountry(string $country): Search
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
     * @return Search
     */
    public function setDirector(string $director): Search
    {
        $this->director = $director;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return Search
     */
    public function setLanguage(string $language): Search
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrimaryType(): string
    {
        return $this->primaryType;
    }

    /**
     * @param string $primaryType
     * @return Search
     */
    public function setPrimaryType(string $primaryType): Search
    {
        $this->primaryType = $primaryType;
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
     * @return Search
     */
    public function setNetwork(string $network): Search
    {
        $this->network = $network;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemoteId(): string
    {
        return $this->remote_id;
    }

    /**
     * @param string $remote_id
     * @return Search
     */
    public function setRemoteId(string $remote_id): Search
    {
        $this->remote_id = $remote_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     * @return Search
     */
    public function setOffset(int $offset): Search
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return Search
     */
    public function setLimit(int $limit): Search
    {
        $this->limit = $limit;
        return $this;
    }
}
