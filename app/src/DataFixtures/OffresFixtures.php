<?php

namespace App\DataFixtures;

use App\Entity\CategoriesOffres;
use App\Entity\Offres;
use App\Entity\Sports;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\String\Slugger\SluggerInterface;

class OffresFixtures extends Fixture implements DependentFixtureInterface
{
    private Generator $faker;
    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->faker = Factory::create('fr_FR');
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        // Remonter à app/
        $appDir = dirname(__DIR__, 2);

        // Construire le chemin complet
        $jsonPath = $appDir . '/public/json-data/sports-paris2024.json';

        // Lecture du fichier
        $jsonContent = file_get_contents($jsonPath);

        // Décoder en tableau associatif
        $data = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException("Erreur JSON : " . json_last_error_msg());
        }

        // Récupérer les catégories d'offres
        $categoriesOffres = $manager->getRepository(CategoriesOffres::class)->findAll();

        $i = 0;

        foreach ($data[0]['data'] as $item) {
            $slug = $item['slug'];

            // Récupérer le sport via repository ou via référence si définie dans SportsFixtures
            $sport = $manager->getRepository(Sports::class)->findOneBy(['slug' => $slug]);
            if (!$sport && $this->hasReference('sport_' . $slug, Sports::class)) {
                $sport = $this->getReference('sport_' . $slug, Sports::class);
            }

            if (!$sport) {
                trigger_error(sprintf('⚠️ Sport introuvable pour le slug "%s". Offre ignorée.', $slug), E_USER_WARNING);
                continue;
            }

            $offre = new Offres();
            $offre
                ->setCode($this->faker->unique()->bothify('OFF###??'))
                ->setSlug($slug)
                ->setDescription("Description de l'offre " . ($i + 1))
                ->setPrix($this->faker->numberBetween(100, 350))
                ->setDateDebut(new \DateTime($item['dateDebut']))
                ->setDateFin(new \DateTime($item['dateFin']))
                ->setNbrAdultes($this->faker->numberBetween(1, 2))
                ->setNbrEnfants($this->faker->numberBetween(1, 6))
                ->setIsLocked($this->faker->boolean())
                ->setLieux($item['lieux'])
                ->addSport($sport)
                ->setIntitule($sport->getIntitule())
                ->setCategorie($this->faker->randomElement($categoriesOffres))                
                ->setIsPublished(true)
                // sélectionne que 5 offres à mettre en avant sur la page d'accueil
                ->setIsPromoted($this->faker->boolean(5))
                ->setCreatedAt(new \DateTimeImmutable());

            $manager->persist($offre);
            $i++;
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SportsFixtures::class,
            CategoriesOffresFixtures::class,
        ];
    }
}
