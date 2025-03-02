<?php

namespace App\Repository;

use App\Entity\TvShow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TvShow>
 *
 * @method TvShow|null find($id, $lockMode = null, $lockVersion = null)
 * @method TvShow|null findOneBy(array $criteria, array $orderBy = null)
 * @method TvShow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TvShowRepository extends ServiceEntityRepository
{
    public const KEY_TVSHOWS = 'tvshows';
    protected EpisodeRepository $episodeRepository;

    public function __construct(ManagerRegistry $registry, EpisodeRepository $episodeRepository)
    {
        parent::__construct($registry, TvShow::class);
        $this->episodeRepository = $episodeRepository;
    }

    public function save(TvShow $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TvShow $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getCountComplete(): int
    {
        $countComplete = 0;
        $allTvShows = $this->findAll();

        if (count($allTvShows) > 0) {
            foreach ($allTvShows as $tvShow) {
                $episodesAll = $tvShow->getEpisodes()->count();
                $episodesOwned = $tvShow->getCountEpisodesOwned();

                if ($episodesAll === $episodesOwned && 0 !== $episodesAll) {
                    ++$countComplete;
                }
            }
        }

        return $countComplete;
    }

    public function getCountAll(): int
    {
        try {
            $result = $this->createQueryBuilder('t')
                ->select('count(t.id) as ' . self::KEY_TVSHOWS)
                ->getQuery()
                ->getOneOrNullResult();

            return $result[self::KEY_TVSHOWS];
        } catch (NonUniqueResultException $e) {
            return 0;
        }
    }

    public function findByTheTvDbId(int $theTvDbId): ?TvShow
    {
        try {
            return $this->createQueryBuilder('t')
                ->where('t.' . TvShow::theTvDbId . ' = :theTvDbId')
                ->setParameter('theTvDbId', $theTvDbId)
                ->getQuery()
                ->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
            return null;
        }
    }

    public function findAll(): array
    {
        return $this->createQueryBuilder('t')
            ->orderBy(sprintf('t.%s', TvShow::name), 'ASC')
            ->getQuery()
            ->getResult();
    }
}
