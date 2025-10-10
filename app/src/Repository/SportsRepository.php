<?php

namespace App\Repository;

use App\Entity\Sports;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Sports>
 */
class SportsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sports::class);
    }
    //Filtrage par discipline sportive
    // uniquement les sports qui apparaissent dans des offres

    public function findSportsInOffres(): array
    {
        return $this->createQueryBuilder('s')
            ->distinct() // évite les doublons
            ->innerJoin('s.offres', 'o')
            ->addSelect('o')
            ->orderBy('s.intitule', 'ASC')
            ->getQuery()
            ->getResult();
    }

    //    /**
    //     * @return Sports[] Returns an array of Sports objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('d.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Sports
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
