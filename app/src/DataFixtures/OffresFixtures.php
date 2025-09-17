<?php

namespace App\DataFixtures;

use App\Entity\CategoriesOffres;
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
    private $slugger;
    public function __construct(SluggerInterface $slugger)
    {
        $this->faker = Factory::create('fr_FR');
        $this->slugger = $slugger;
    }
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $sports = $manager->getRepository(Sports::class)->findAll();
        $categoriesOffres = $manager->getRepository(CategoriesOffres::class)->findAll();

        for ($i = 0; $i < 50; $i++) {
            $offre = new \App\Entity\Offres();
            $offre
                ->setCode($this->faker->unique()->bothify('OFF###??'))
                ->setIntitule("Intitulé de l'offre " . ($i + 1))
                ->setSlug($this->slugger->slug(strtolower($offre->getIntitule())))
                ->setDescription("Description de l'offre " . ($i + 1))
                ->setPrix($this->faker->numberBetween(100, 350))
                ->setDateDebut($this->faker->dateTimeBetween('-1 years', 'now'))
                ->setDateFin($this->faker->dateTimeBetween('now', '+6 months'))
                ->setNbrAdultes($this->faker->numberBetween(1, 2))
                ->setNbrEnfants($this->faker->numberBetween(1, 6))
                ->setIsLocked($this->faker->boolean($i - 2))

                //On récupère une référence à la catégorie d'offre
                ->setCategorie($this->faker->randomElement($categoriesOffres))
                ->setIsPublished(true);

            // Associer entre 1 et 3 sports au hasard
            $randomSports = $faker->randomElements($sports, $faker->numberBetween(1, 3));
            foreach ($randomSports as $sport) {
                $offre->addSport($sport);
            }
            $offre->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($offre);
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
