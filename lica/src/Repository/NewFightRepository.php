<?php

namespace App\Repository;

use App\Entity\NewFight;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NewFight|null find($id, $lockMode = null, $lockVersion = null)
 * @method NewFight|null findOneBy(array $criteria, array $orderBy = null)
 * @method NewFight[]    findAll()
 * @method NewFight[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewFightRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NewFight::class);
    }

//    /**
//     * @return NewFight[] Returns an array of NewFight objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NewFight
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
