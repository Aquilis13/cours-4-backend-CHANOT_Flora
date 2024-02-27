<?php

namespace App\Repository;

use App\Entity\Ahi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ahi>
 *
 * @method Ahi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ahi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ahi[]    findAll()
 * @method Ahi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AhiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ahi::class);
    }

//    /**
//     * @return Ahi[] Returns an array of Ahi objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Ahi
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
