<?php

namespace App\Repository;

use App\Entity\Offres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Offres>
 */
class OffresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offres::class);
    }

    public function getOffresParCategories(string $categorie): array
    {
        if ($categorie = 'toutes') {
            return $this->createQueryBuilder('o')
                ->orderBy('o.intitule', 'ASC')
                ->getQuery()
                ->getResult();
        } else {
            return $this->createQueryBuilder('o')
                ->join('o.categorie', 'c')
                ->andWhere('c.nom = :categorie')
                ->setParameter('categorie', $categorie)
                ->orderBy('o.intitule', 'ASC')
                ->getQuery()
                ->getResult();
        }
    }

    //    /**
    //     * @return Offres[] Returns an array of Offres objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('o.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Offres
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
