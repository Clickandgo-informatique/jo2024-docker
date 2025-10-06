<?php

namespace App\Repository;

use App\Entity\DetailsCommandes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DetailsCommandes>
 */
class DetailsCommandesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DetailsCommandes::class);
    }

    public function les10MeilleuresVentesOffres(): array
    {
        return $this->createQueryBuilder('d')
            ->select('o.intitule AS offre, s.emoji AS emoji, s.id AS sport_id, SUM(d.quantite) AS totalVentes')
            ->join('d.offres', 'o')
            ->join('o.sports', 's')       // relation vers Sport
            ->join('d.commande', 'c')
            ->where('c.payeeLe IS NOT NULL')
            ->groupBy('o.id, s.id, s.emoji')
            ->orderBy('totalVentes', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }
    public function pourcentageParCategorieOffres(): array
    {
        return $this->createQueryBuilder('d')
            ->select('c.nom AS categorie, SUM(d.quantite) AS totalVentes')
            ->join('d.offres', 'o')
            ->join('o.categorie', 'c')       // relation vers CategoriesOffres
            ->join('d.commande', 'cmd')
            ->where('cmd.payeeLe IS NOT NULL') // seulement commandes payées
            ->groupBy('c.id')
            ->orderBy('totalVentes', 'DESC')
            ->getQuery()
            ->getResult();
    }
};
