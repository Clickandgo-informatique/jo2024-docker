<?php

namespace App\Tests\Entity;

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Tests unitaires pour l'entité Users.
 * Ces tests valident les contraintes définies sur les champs de l'entité
 * sauf pour le mot de passe, dont la validation est gérée uniquement via le formulaire.
 */
class UsersEntityTest extends KernelTestCase
{
    /**
     * Retourne un utilisateur valide pour servir de base aux tests.
     */
    private function getValidUser(): Users
    {
        return (new Users())
            ->setNickname('TestUser')
            ->setEmail('test@example.com')
            ->setPassword('Password123!') // la validation du mot de passe se fait côté formulaire
            ->setRoles(['ROLE_USER'])
            ->setCreatedAt(new \DateTimeImmutable())
            ->setFirstname('John')
            ->setLastname('Doe')
            ->setZipcode('75000')
            ->setAddress('1 rue de Paris')
            ->setCity('Paris')
            ->setCountry('France');
    }

    /**
     * Test qu'un utilisateur valide ne génère aucune erreur.
     */
    public function testValidUser(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $user = $this->getValidUser();
        $errors = $validator->validate($user);

        $this->assertCount(0, $errors, 'L’entité Users devrait être valide.');
    }

    /**
     * Test du pseudo vide.
     * Devrait générer au moins une erreur.
     */
    public function testBlankNickname(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $user = $this->getValidUser()->setNickname('');
        $errors = $validator->validate($user);

        $this->assertGreaterThan(0, count($errors), 'Un pseudo vide doit générer une erreur.');
    }

    /**
     * Test du pseudo trop court (<3 caractères).
     */
    public function testShortNickname(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $user = $this->getValidUser()->setNickname('AB');
        $errors = $validator->validate($user);

        $this->assertGreaterThan(0, count($errors), 'Un pseudo trop court doit générer une erreur.');
    }

    /**
     * Test du pseudo trop long (>25 caractères).
     */
    public function testLongNickname(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $user = $this->getValidUser()->setNickname(str_repeat('a', 26));
        $errors = $validator->validate($user);

        $this->assertGreaterThan(0, count($errors), 'Un pseudo trop long doit générer une erreur.');
    }

    /**
     * Test d'un email vide.
     */
    public function testBlankEmail(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $user = $this->getValidUser()->setEmail('');
        $errors = $validator->validate($user);

        $this->assertGreaterThan(0, count($errors), 'Un email vide doit générer une erreur.');
    }

    /**
     * Test d'un email invalide.
     */
    public function testInvalidEmail(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $user = $this->getValidUser()->setEmail('invalid-email');
        $errors = $validator->validate($user);

        $this->assertGreaterThan(0, count($errors), 'Un email invalide doit générer une erreur.');
    }

    /**
     * Test d'un rôle invalide.
     */
    public function testInvalidRole(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $user = $this->getValidUser()->setRoles(['ROLE_UNKNOWN']);
        $errors = $validator->validate($user);

        $this->assertGreaterThan(0, count($errors), 'Un rôle invalide doit générer une erreur.');
    }

    /**
     * Test du prénom trop long (>60 caractères).
     */
    public function testFirstnameTooLong(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $user = $this->getValidUser()->setFirstname(str_repeat('a', 61));
        $errors = $validator->validate($user);

        $this->assertGreaterThan(0, count($errors), 'Le prénom trop long doit générer une erreur.');
    }

    /**
     * Test du nom trop long (>60 caractères).
     */
    public function testLastnameTooLong(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $user = $this->getValidUser()->setLastname(str_repeat('a', 61));
        $errors = $validator->validate($user);

        $this->assertGreaterThan(0, count($errors), 'Le nom trop long doit générer une erreur.');
    }

    /**
     * Test de la ville trop longue (>80 caractères).
     */
    public function testCityTooLong(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $user = $this->getValidUser()->setCity(str_repeat('a', 81));
        $errors = $validator->validate($user);

        $this->assertGreaterThan(0, count($errors), 'La ville trop longue doit générer une erreur.');
    }

    /**
     * Test du pays trop long (>80 caractères).
     */
    public function testCountryTooLong(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $user = $this->getValidUser()->setCountry(str_repeat('a', 81));
        $errors = $validator->validate($user);

        $this->assertGreaterThan(0, count($errors), 'Le pays trop long doit générer une erreur.');
    }

    /**
     * Test de l'adresse trop longue (>150 caractères).
     */
    public function testAddressTooLong(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $user = $this->getValidUser()->setAddress(str_repeat('a', 151));
        $errors = $validator->validate($user);

        $this->assertGreaterThan(0, count($errors), 'L’adresse trop longue doit générer une erreur.');
    }

    /**
     * Test d'un code postal invalide.
     */
    public function testInvalidZipcode(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $user = $this->getValidUser()->setZipcode('ABCDE');
        $errors = $validator->validate($user);

        $this->assertGreaterThan(0, count($errors), 'Un code postal invalide doit générer une erreur.');
    }
}
