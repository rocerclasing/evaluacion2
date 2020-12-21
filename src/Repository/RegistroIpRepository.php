<?php

namespace App\Repository;

use App\Entity\RegistroIp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RegistroIp|null find($id, $lockMode = null, $lockVersion = null)
 * @method RegistroIp|null findOneBy(array $criteria, array $orderBy = null)
 * @method RegistroIp[]    findAll()
 * @method RegistroIp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegistroIpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RegistroIp::class);
    }

    // /**
    //  * @return RegistroIp[] Returns an array of RegistroIp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RegistroIp
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
