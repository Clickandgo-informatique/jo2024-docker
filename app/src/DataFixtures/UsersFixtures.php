<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Uid\Uuid;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{
    private Generator $faker;
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
        $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {
        //Création d'un administrateur
        $admin = new Users();

        $admin
            ->setNickname('adminjo2024')
            ->setPassword($this->passwordHasher->hashPassword($admin, 'Admin-jo2024!'))
            ->setFirstname($this->faker->firstName())
            ->setLastname($this->faker->lastName())
            ->setAddress($this->faker->streetAddress())
            ->setCity($this->faker->city())
            ->setCountry('France')
            ->setZipcode(trim($this->faker->postcode()))
            ->setEmail('admin@jo2024.fr')
            ->setRoles(['ROLE_ADMIN'])
            // Génération uniforme du accountKey
            ->setAccountKey(Uuid::v4()->toRfc4122())
            ->setCreatedAt(new \DateTimeImmutable());

        $manager->persist($admin);

        // Génération de 3 sales managers
        for ($i = 0; $i < 3; $i++) {
            $salesManager = new Users();
            $salesManager
                ->setNickname($this->faker->userName())
                ->setPassword($this->passwordHasher->hashPassword($salesManager, 'Sm-jo2024!'))
                ->setFirstname($this->faker->firstName())
                ->setLastname($this->faker->lastName())
                ->setAddress($this->faker->streetAddress())
                ->setCity($this->faker->city())
                ->setCountry('France')
                ->setZipcode(trim($this->faker->postcode()))
                ->setEmail($this->faker->email())
                ->setRoles(['ROLE_SALES_MANAGER'])
                // Génération uniforme du accountKey
                ->setAccountKey(Uuid::v4()->toRfc4122())
                ->setCreatedAt(new \DateTimeImmutable());

            $manager->persist($salesManager);
        }

        //Création d'utilisateurs factices
        for ($i = 0; $i < 50; $i++) {

            $user = new Users();
            $user->setNickname($this->faker->username())
                ->setFirstname($this->faker->firstName())
                ->setLastname($this->faker->lastName())
                ->setAddress($this->faker->streetAddress())
                ->setCity($this->faker->city())
                ->setCountry('France')
                ->setZipcode(trim($this->faker->postcode()))
                ->setEmail($this->faker->email())
                // Génération uniforme du accountKey
                ->setAccountKey(Uuid::v4()->toRfc4122())
                ->setPassword($this->passwordHasher->hashPassword($user, 'User-jo2024!'))
                ->setRoles(['ROLE_USER'])
                ->setCreatedAt(new \DateTimeImmutable());
            //On crée une référence user
            $this->setReference('user _' . $i, $user);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
