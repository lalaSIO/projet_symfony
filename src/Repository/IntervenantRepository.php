<?php

namespace App\Repository;

use App\Entity\Intervenant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Intervenant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Intervenant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Intervenant[]    findAll()
 * @method Intervenant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IntervenantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Intervenant::class);
    }


    public function checklog($nom,$mdp )
    {
        $conn = $this->getEntityManager()
            ->getConnection();

        $sql = 'SELECT nom FROM intervenant where nom = :nom and mdp = :mdp';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['nom' => $nom,'mdp' => $mdp]);
        $stmt->fetchAll();

        return $stmt;
    }

     /**
      * @return Intervenant[] Returns an array of Intervenant objects
      */

    public function checklog2($nom,$mdp)
    {
        return $this->createQueryBuilder('intervenant')
            ->andWhere('intervenant.nom = :nom')
            ->andWhere('intervenant.mdp = :mdp ')
            ->setParameters(array('nom' => $nom, 'mdp' => $mdp))
            ->orderBy('intervenant.nom', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Intervenant
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
