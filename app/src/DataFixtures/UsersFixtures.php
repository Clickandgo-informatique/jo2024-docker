<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
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
            ->setEmail('admin@jo2024.fr')
            ->setRoles(['ROLE_ADMIN'])
            ->setCreatedAt(new \DateTimeImmutable());

        $manager->persist($admin);

        //Création d'utilisateurs factices
        for ($i = 0; $i < 50; $i++) {

            $user = new Users();
            $user->setNickname($this->faker->username())
                ->setEmail($this->faker->email())
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
