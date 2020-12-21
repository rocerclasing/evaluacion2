<?php

namespace App\Repository;

use App\Entity\Usuarioconip;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Usuarioconip|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usuarioconip|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usuarioconip[]    findAll()
 * @method Usuarioconip[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuarioconipRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Usuarioconip::class);
    }

    // /**
    //  * @return Usuarioconip[] Returns an array of Usuarioconip objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Usuarioconip
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
