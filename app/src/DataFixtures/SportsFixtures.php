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
        $jsonPath = $appDir . '/public/json-data/sports-paris2024.json';

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

            //Remplissage de la table sports avec le data du fichier json
            $sport->setIntitule($item['sport'])
                //On crée le slug correspondant
                ->setSlug($this->slugger->slug(strtolower($sport->getIntitule())))
                ->setEmoji($item['emoji'])
                ->setPictogramme($item['pictogramme'])
                ->setRegles($item['regles'])
                ->setDureeMatch($item['duree_match'])
                ->setDescription($item['description']);

            $this->addReference('sport_' . $sport->getSlug(), $sport);

            $manager->persist($sport);
        }
        $manager->flush();
    }
}
