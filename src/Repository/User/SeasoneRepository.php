<?php

namespace App\Repository\User;

use App\Entity\User\Seasone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Seasone>
 *
 * @method Seasone|null find($id, $lockMode = null, $lockVersion = null)
 * @method Seasone|null findOneBy(array $criteria, array $orderBy = null)
 * @method Seasone[]    findAll()
 * @method Seasone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeasoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Seasone::class);
    }

//    /**
//     * @return Seasone[] Returns an array of Seasone objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Seasone
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
