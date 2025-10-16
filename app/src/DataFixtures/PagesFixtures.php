<?php

namespace App\DataFixtures;

use App\Entity\Pages;
use App\Entity\PagesSections;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\String\Slugger\SluggerInterface;

class PagesFixtures extends Fixture
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
        //Création de 15 pages
        for ($i = 1; $i < 16; $i++) {
            $page = new Pages();

            $page->setTitre('Titre de la page n° ' . $i)
                ->setDescription($this->faker->realText(200))
                ->setSlug($this->slugger->slug(strtolower($page->getTitre())));

            //Création de 5 sections pour chaque page
            for ($j = 1; $j < 6; $j++) {
                $section = new PagesSections();
                $section->setTitre('Titre de la section n° ' . $j . ' de la page n° ' . $i)
                    ->setSlug($this->slugger->slug(strtolower($section->getTitre())))
                    ->setContenu($this->faker->realText(300));

                //Ajout de la section à la page en cours de création
                $manager->persist($section);

                $page->addPagesSection($section);
            }

            $manager->persist($page);
        }
        $manager->flush();
    }
}
