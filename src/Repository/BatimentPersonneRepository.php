<?php

namespace App\Repository;

use App\Entity\BatimentPersonne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BatimentPersonne>
 *
 * @method BatimentPersonne|null find($id, $lockMode = null, $lockVersion = null)
 * @method BatimentPersonne|null findOneBy(array $criteria, array $orderBy = null)
 * @method BatimentPersonne[]    findAll()
 * @method BatimentPersonne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BatimentPersonneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BatimentPersonne::class);
    }

//    /**
//     * @return BatimentPersonne[] Returns an array of BatimentPersonne objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BatimentPersonne
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
