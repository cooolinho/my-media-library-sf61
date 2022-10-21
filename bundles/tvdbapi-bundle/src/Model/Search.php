<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model;

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

    public function getQuery(): string
    {
        return $this->query;
    }

    public function setQuery(string $query): Search
    {
        $this->query = $query;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Search
    {
        $this->type = $type;

        return $this;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): Search
    {
        $this->year = $year;

        return $this;
    }

    public function getCompany(): string
    {
        return $this->company;
    }

    public function setCompany(string $company): Search
    {
        $this->company = $company;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): Search
    {
        $this->country = $country;

        return $this;
    }

    public function getDirector(): string
    {
        return $this->director;
    }

    public function setDirector(string $director): Search
    {
        $this->director = $director;

        return $this;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): Search
    {
        $this->language = $language;

        return $this;
    }

    public function getPrimaryType(): string
    {
        return $this->primaryType;
    }

    public function setPrimaryType(string $primaryType): Search
    {
        $this->primaryType = $primaryType;

        return $this;
    }

    public function getNetwork(): string
    {
        return $this->network;
    }

    public function setNetwork(string $network): Search
    {
        $this->network = $network;

        return $this;
    }

    public function getRemoteId(): string
    {
        return $this->remote_id;
    }

    public function setRemoteId(string $remote_id): Search
    {
        $this->remote_id = $remote_id;

        return $this;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function setOffset(int $offset): Search
    {
        $this->offset = $offset;

        return $this;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): Search
    {
        $this->limit = $limit;

        return $this;
    }
}
