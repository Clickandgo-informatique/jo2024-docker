<?php

namespace App\DataFixtures;

use App\Entity\Commandes;
use App\Entity\DetailsCommandes;
use App\Entity\Offres;
use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class CommandesFixtures extends Fixture implements DependentFixtureInterface
{
    private Generator $faker;
    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $users = $manager->getRepository(Users::class)->findAll();
        $offres = $manager->getRepository(Offres::class)->findAll();

        for ($i = 0; $i < 100; $i++) {
            $commande = new Commandes();

            //On génère un user aléatoire grâce au UsersRepository
            $commande->setUser($this->faker->randomElement($users));

            $commande->setPayeeLe(new \DateTimeImmutable());
            $commande->setCreatedAt(new \DateTimeImmutable());
            $commande->setReference($this->faker->unique()->bothify('##############'));

            //On génère des lignes de commandes aléatoires entre 1 et 5
            $details = new DetailsCommandes();

            for ($j = 0; $j < random_int(0, 4); $j++) {
                //On sélectionne aléatoirement une offre existante dans le repository
                $offre = $this->faker->randomElement($offres);

                //On attribue une offre à la ligne de détails
                $details->setOffres($offre)
                    ->setPrix($offre->getPrix())
                    ->setQuantite(random_int(0, 5));

                // On ajoute le détail commande à la commande
                $commande->addDetailsCommande($details);
            }
            $manager->persist($commande);
        }
        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [UsersFixtures::class, OffresFixtures::class];
    }
}
