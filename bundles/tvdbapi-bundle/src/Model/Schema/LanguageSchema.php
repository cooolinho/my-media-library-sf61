<?php

declare(strict_types=1);

namespace Cooolinho\Bundle\TVDBApiBundle\Model\Schema;

class LanguageSchema extends BaseSchema
{
    private string $id;
    private string $name;
    private string $nativeName;
    private string $shortCode;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): LanguageSchema
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): LanguageSchema
    {
        $this->name = $name;
        return $this;
    }

    public function getNativeName(): string
    {
        return $this->nativeName;
    }

    public function setNativeName(string $nativeName): LanguageSchema
    {
        $this->nativeName = $nativeName;
        return $this;
    }

    public function getShortCode(): string
    {
        return $this->shortCode;
    }

    public function setShortCode(string $shortCode): LanguageSchema
    {
        $this->shortCode = $shortCode;
        return $this;
    }
}
