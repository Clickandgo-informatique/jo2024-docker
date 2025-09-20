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

    public function getOffresParCategories(string $slug): array
    {
        if ($slug === 'toutes') {
            return $this->createQueryBuilder('o')
                ->orderBy('o.intitule', 'ASC')
                ->getQuery()
                ->getResult();
        } else {
            return $this->createQueryBuilder('o')
                ->join('o.categorie', 'c')
                ->andWhere('c.slug = :slug')
                ->andWhere('o.isPublished = true')
                ->setParameter('slug', $slug)
                ->orderBy('o.intitule', 'ASC')
                ->getQuery()
                ->getResult();
        }
    }

    // OffreRepository → filtrer par slugs (ManyToMany)
    /**
     * Retourne toutes les offres liées à une liste de sports (par slug)
     *
     * @param array $slugs Liste de slugs des sports
     */
    // src/Repository/OffresRepository.php

    public function findBySportSlugs(array $slugs)
    {
        return $this->createQueryBuilder('o')
            ->innerJoin('o.sports', 's') // relation ManyToMany
            ->andWhere('s.slug IN (:slugs)')
            ->setParameter('slugs', $slugs)
            ->orderBy('o.dateDebut', 'ASC') // adapte le champ si nécessaire
            ->getQuery();
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
