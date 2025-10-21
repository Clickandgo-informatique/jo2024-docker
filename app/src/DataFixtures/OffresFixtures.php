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
    $appDir = dirname(__DIR__, 2);
    $jsonPath = $appDir . '/public/json-data/sports-paris2024.json';
    $jsonContent = file_get_contents($jsonPath);
    $data = json_decode($jsonContent, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new \RuntimeException("Erreur JSON : " . json_last_error_msg());
    }

    $categoriesOffres = $manager->getRepository(CategoriesOffres::class)->findAll();
    $offres = []; // <-- tableau temporaire pour garder les références

    foreach ($data[0]['data'] as $i => $item) {
        $slug = $item['slug'];
        $sport = $manager->getRepository(Sports::class)->findOneBy(['slug' => $slug]);

        if (!$sport && $this->hasReference('sport_' . $slug, Sports::class)) {
            $sport = $this->getReference('sport_' . $slug, Sports::class);
        }

        if (!$sport) {
            trigger_error(sprintf('Sport introuvable pour le slug "%s". Offre ignorée.', $slug), E_USER_WARNING);
            continue;
        }

        $euros = $this->faker->numberBetween(100, 1000);
        $centimes = $this->faker->randomElement([0, 15, 20, 25, 50, 75]);
        $prix = (string) number_format($euros + ($centimes / 100), 2, '.', '');

        $offre = new Offres();
        $offre
            ->setCode($this->faker->unique()->bothify('OFF###??'))
            ->setSlug($slug)
            ->setDescription("Description de l'offre " . ($i + 1))
            ->setPrix($prix)
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
            ->setIsPromoted(false) // <-- par défaut non promue
            ->setCreatedAt(new \DateTimeImmutable());

        $manager->persist($offre);
        $offres[] = $offre;
    }

    // S’assurer qu’au moins 5 offres soient promues
    $totalOffres = count($offres);
    if ($totalOffres > 0) {
        $minPromotions = min(5, $totalOffres); // si moins de 5 offres au total
        $promotedKeys = (array) array_rand($offres, $minPromotions);

        foreach ($promotedKeys as $key) {
            $offres[$key]->setIsPromoted(true);
        }
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
