<?php

namespace App\DataFixtures;

use App\Entity\Sports;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class SportsFixtures extends Fixture
{
    private $slugger;
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }
    public function load(ObjectManager $manager): void
    {
        // Remonter à app/
        $appDir = dirname(__DIR__, 2);

        // Construire le chemin complet
        $jsonPath = $appDir . '/public/json-data/disciplines.json';

        //Lecture du fichier
        $jsonContent = file_get_contents($jsonPath);

        // Décoder en tableau associatif
        $data = json_decode($jsonContent, true);

        // Vérifier qu'il n'y a pas d'erreur
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException("Erreur JSON : " . json_last_error_msg());
        }

        //Création de chaque sport dans la bdd
        foreach ($data[0]['data'] as $item) {
            $sport = new Sports();
            $sport->setIntitule($item['intitule']);
            //On crée le slug correspondant
            $sport->setSlug($this->slugger->slug(strtolower($sport->getIntitule())));            

            $manager->persist($sport);
        }
        $manager->flush();
    }
}
