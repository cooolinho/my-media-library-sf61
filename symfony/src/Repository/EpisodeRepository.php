<?php

namespace App\Repository;

use App\Entity\Episode;
use App\Entity\TvShow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Episode>
 *
 * @method Episode|null find($id, $lockMode = null, $lockVersion = null)
 * @method Episode|null findOneBy(array $criteria, array $orderBy = null)
 * @method Episode[]    findAll()
 * @method Episode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EpisodeRepository extends ServiceEntityRepository
{
    private const KEY_EPISODES = 'episodes';

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Episode::class);
    }

    public function save(Episode $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Episode $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getCountOwned(): int
    {
        try {
            $result = $this->createQueryBuilder('e')
                ->select('count(e.id) as '.self::KEY_EPISODES)
                ->andWhere('e.'.Episode::isOwned.' = :isOwned')
                ->setParameter('isOwned', true)
                ->getQuery()
                ->getOneOrNullResult();

            return $result[self::KEY_EPISODES];
        } catch (NonUniqueResultException $e) {
            return 0;
        }
    }

    public function getCountAll(): int
    {
        try {
            $result = $this->createQueryBuilder('e')
                ->select('count(e.id) as '.self::KEY_EPISODES)
                ->getQuery()
                ->getOneOrNullResult();

            return $result[self::KEY_EPISODES];
        } catch (NonUniqueResultException $e) {
            return 0;
        }
    }

    public function getByTvShow(TvShow $tvShow)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.'.Episode::tvshow_id.' = :tvshowId')
            ->setParameter('tvshowId', $tvShow->getId())
            ->getQuery()
            ->getResult();
    }

    public function getCountByTvShow(TvShow $tvShow): int
    {
        return count($this->getByTvShow($tvShow));
    }

    public function getOwnedByTvShow(TvShow $tvShow)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.'.Episode::tvshow_id.' = :tvshowId')
            ->andWhere('e.'.Episode::isOwned.' = :isOwned')
            ->setParameter('tvshowId', $tvShow->getId())
            ->setParameter('isOwned', true)
            ->getQuery()
            ->getResult();
    }

    public function getCountOwnedByTvShow(TvShow $tvShow): int
    {
        return count($this->getOwnedByTvShow($tvShow));
    }
}
