<?php

namespace App\Repository;

use App\Entity\Typejour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Typejour|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typejour|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typejour[]    findAll()
 * @method Typejour[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypejourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typejour::class);
    }

    // /**
    //  * @return Typejour[] Returns an array of Typejour objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Typejour
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
