<?php

namespace App\Entity;

use App\Repository\TvShowRepository;
use App\Validator\TVDBId;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TvShowRepository::class)]
class TvShow
{
    public const id = 'id';
    public const name = 'name';
    public const slug = 'slug';
    public const theTvDbId = 'theTvDbId';
    public const episodes = 'episodes';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(unique: true, nullable: true)]
    #[TVDBId]
    private ?int $theTvDbId = null;

    #[ORM\OneToMany(mappedBy: 'tvshow', targetEntity: Episode::class, orphanRemoval: true)]
    private Collection $episodes;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(length: 4, nullable: true)]
    private ?string $year = null;

    public function __construct()
    {
        $this->episodes = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Episode>
     */
    public function getEpisodes(): Collection
    {
        return $this->episodes;
    }

    public function addEpisode(Episode $episode): self
    {
        if (!$this->episodes->contains($episode)) {
            $this->episodes->add($episode);
            $episode->setTvshow($this);
        }

        return $this;
    }

    public function removeEpisode(Episode $episode): self
    {
        // set the owning side to null (unless already changed)
        if ($this->episodes->removeElement($episode) && $episode->getTvshow() === $this) {
            $episode->setTvshow(null);
        }

        return $this;
    }

    public function getEpisodeBySeasonAndNumber(int $seasonNumber, int $number): ?Episode
    {
        $episodes = $this->episodes->filter(function (Episode $episode) use ($seasonNumber, $number) {
            return $episode->getSeasonNumber() === $seasonNumber && $episode->getNumber() === $number;
        });

        return 1 === $episodes->count() ? $episodes->first() : null;
    }

    public function getFilesystemDirectory(): string
    {
        return $this->getName();
    }

    public function getEpisodesInSeasonArray(): array
    {
        $seasons = [];
        foreach ($this->getEpisodes() as $episode) {
            $seasons[$episode->getSeasonNumber()][] = $episode;
        }

        return $seasons;
    }

    public function getCountEpisodesOwned(): int
    {
        $episodes = $this->getEpisodes()->filter(function (Episode $episode) {
            return $episode->isOwned();
        });

        return $episodes->count();
    }

    public function getCountEpisodesBySeasonNumber(int $seasonNumber): int
    {
        $countEpisodes = 0;
        $seasons = $this->getEpisodesInSeasonArray();

        if (!isset($seasons[$seasonNumber])) {
            return $countEpisodes;
        }

        return count($seasons[$seasonNumber]);
    }

    public function getCountEpisodesOwnedBySeasonNumber(int $seasonNumber): int
    {
        $owned = 0;
        $seasons = $this->getEpisodesInSeasonArray();

        if (!isset($seasons[$seasonNumber])) {
            return $owned;
        }

        /** @var Episode $episode */
        foreach ($seasons[$seasonNumber] as $episode) {
            if ($episode->isOwned()) {
                ++$owned;
            }
        }

        return $owned;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(?string $year): self
    {
        $this->year = $year;

        return $this;
    }
}
