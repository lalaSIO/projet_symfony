<?php

namespace App\Repository;

use App\Entity\Demijour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Demijour|null find($id, $lockMode = null, $lockVersion = null)
 * @method Demijour|null findOneBy(array $criteria, array $orderBy = null)
 * @method Demijour[]    findAll()
 * @method Demijour[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemijourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Demijour::class);
    }

    // /**
    //  * @return Demijour[] Returns an array of Demijour objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Demijour
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
