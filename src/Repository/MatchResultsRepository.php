<?php

namespace App\Repository;

use App\Entity\MatchResults;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MatchResults>
 *
 * @method MatchResults|null find($id, $lockMode = null, $lockVersion = null)
 * @method MatchResults|null findOneBy(array $criteria, array $orderBy = null)
 * @method MatchResults[]    findAll()
 * @method MatchResults[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatchResultsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MatchResults::class);
    }

//    /**
//     * @return MatchResults[] Returns an array of MatchResults objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MatchResults
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
