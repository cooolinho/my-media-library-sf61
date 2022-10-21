<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\TvShow;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class FilesReaderService
{
    private const REGEX_SEASON = '/S([0-9]{2})/';
    private const REGEX_EPISODE = '/E([0-9]{2,3})/';
    public const REGEX_SEASON_EPISODE = '/S([0-9]{2})E([0-9]{2,3})/';

    protected Filesystem $fs;
    protected Finder $finder;

    protected EntityManagerInterface $entityManager;
    protected ParameterBagInterface $parameterBag;

    public function __construct(
        EntityManagerInterface $entityManager,
        ParameterBagInterface $parameterBag,
    ) {
        $this->entityManager = $entityManager;
        $this->parameterBag = $parameterBag;

        $this->fs = new Filesystem();
        $this->finder = new Finder();
    }

    public function getFileList(string $directory, int $depth = 1): array
    {
        if (!$this->fs->exists($directory)) {
            return [];
        }

        return iterator_to_array($this->finder->in($directory)->files()->depth($depth));
    }

    public function readTvShowDirectory(TvShow $tvShow): void
    {
        $pathOnFilesystem = $this->parameterBag->get('tvshow.filesystem.base_directory').$tvShow->getFilesystemDirectory();
        $files = $this->getFileList($pathOnFilesystem);

        /** @var SplFileInfo $file */
        foreach ($files as $file) {
            preg_match(self::REGEX_SEASON, $file->getRelativePathname(), $matchesSeason);
            preg_match(self::REGEX_EPISODE, $file->getRelativePathname(), $matchesEpisode);

            if (2 === count($matchesSeason) && 2 === count($matchesEpisode)) {
                $seasonNumber = (int) $matchesSeason[1];
                $episodeNumber = (int) $matchesEpisode[1];

                if (($episode = $tvShow->getEpisodeBySeasonAndNumber($seasonNumber, $episodeNumber)) && !$episode->isOwned()) {
                    $episode->setIsOwned(true);
                    $this->entityManager->persist($episode);
                }
            }
        }

        $this->entityManager->flush();
    }

    public function matchEpisodesFromText(TvShow $tvShow, string $text): void
    {
        preg_match_all(self::REGEX_SEASON_EPISODE, $text, $matches);

        [$matchesSeasonEpisodes, $matchesSeasons, $matchesEpisodes] = $matches;
        foreach ($matchesSeasonEpisodes as $key => $matchesEpisode) {
            $episode = $tvShow->getEpisodeBySeasonAndNumber($matchesSeasons[$key], $matchesEpisodes[$key]);

            if ($episode && !$episode->isOwned()) {
                $episode->setIsOwned();
                $this->entityManager->persist($episode);
            }
        }

        $this->entityManager->flush();
    }
}
