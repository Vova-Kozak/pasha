<?php

namespace App\Repository;

use App\Entity\UserSIN;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserSIN|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserSIN|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserSIN[]    findAll()
 * @method UserSIN[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserSINRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserSIN::class);
    }

    // /**
    //  * @return UserSIN[] Returns an array of UserSIN objects
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
    public function findOneBySomeField($value): ?UserSIN
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
