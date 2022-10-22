<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Schema;

class Status extends BaseSchema
{
    public const CONTINUING = 'continuing';
    public const ENDED = 'ended';

    public int $id = 0;
    public bool $keepUpdated = false;
    public string $name = '';
    public string $recordType = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Status
    {
        $this->id = $id;

        return $this;
    }

    public function isKeepUpdated(): bool
    {
        return $this->keepUpdated;
    }

    public function setKeepUpdated(bool $keepUpdated): Status
    {
        $this->keepUpdated = $keepUpdated;

        return $this;
    }

    public function getName(): string
    {
        return strtolower($this->name);
    }

    public function setName(string $name): Status
    {
        $this->name = strtolower($name);

        return $this;
    }

    public function getRecordType(): string
    {
        return $this->recordType;
    }

    public function setRecordType(string $recordType): Status
    {
        $this->recordType = $recordType;

        return $this;
    }
}
