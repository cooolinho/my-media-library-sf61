<?php

namespace App\Entity;

use App\Repository\EpisodeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpisodeRepository::class)]
class Episode
{
    public const id = 'id';
    public const name = 'name';
    public const theTvDbId = 'theTvDbId';
    public const seasonNumber = 'seasonNumber';
    public const number = 'number';
    public const isOwned = 'isOwned';
    public const tvshow_id = 'tvshow';

    // relations
    public const belongs_to_tv_show = 'tvshow';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $theTvDbId = null;

    #[ORM\Column(nullable: true)]
    private ?int $seasonNumber = null;

    #[ORM\Column(nullable: true)]
    private ?int $number = null;

    #[ORM\ManyToOne(inversedBy: 'episodes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TvShow $tvshow = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isOwned = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTheTvDbId(): ?int
    {
        return $this->theTvDbId;
    }

    public function setTheTvDbId(?int $theTvDbId): self
    {
        $this->theTvDbId = $theTvDbId;

        return $this;
    }

    public function getSeasonNumber(): ?int
    {
        return $this->seasonNumber;
    }

    public function setSeasonNumber(?int $seasonNumber): self
    {
        $this->seasonNumber = $seasonNumber;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(?int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getTvshow(): ?TvShow
    {
        return $this->tvshow;
    }

    public function setTvshow(?TvShow $tvshow): self
    {
        $this->tvshow = $tvshow;

        return $this;
    }

    public function isOwned(): ?bool
    {
        return $this->isOwned;
    }

    public function setIsOwned(?bool $isOwned = true): self
    {
        $this->isOwned = $isOwned;

        return $this;
    }
}
