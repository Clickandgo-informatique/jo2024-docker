<?php

namespace App\Tests\Entity;

use App\Entity\Sports;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Classe de test pour l'entité Sports.
 * Vérifie les contraintes de validation :
 *  - longueur minimale et maximale des champs
 *  - format du code couleur
 *  - unicité du champ "intitule"
 */
class SportsValidationTest extends KernelTestCase
{
    /**
     * Retourne le validateur Symfony pour valider les entités.
     */
    private function getValidator()
    {
        self::bootKernel();
        return static::getContainer()->get('validator');
    }

    /**
     * Vérifie qu'une entité Sports génère le nombre d'erreurs attendu.
     *
     * @param Sports $sport L'entité à valider
     * @param int $expectedErrorCount Nombre d'erreurs attendu
     */
    private function assertHasErrors(Sports $sport, int $expectedErrorCount): void
    {
        $validator = $this->getValidator();
        $errors = $validator->validate($sport);

        // Construction d'un tableau de messages pour affichage en cas d'échec
        $messages = [];
        foreach ($errors as $error) {
            $messages[] = $error->getPropertyPath() . ' => ' . $error->getMessage();
        }

        $this->assertCount($expectedErrorCount, $errors, implode("\n", $messages));
    }

    /**
     * Test d'un sport valide.
     * Utilise un intitulé unique pour éviter les erreurs dues à la contrainte UniqueEntity.
     */
    public function testValidSport(): void
    {
        $sport = (new Sports())
            ->setIntitule('Handball_' . uniqid())
            ->setIcone('hand.png')
            ->setBackgroundColor('#FF0000')
            ->setSlug('handball');

        // Aucun message d'erreur attendu
        $this->assertHasErrors($sport, 0);
    }

    /**
     * Test d'un sport avec intitulé vide.
     * Doit générer deux erreurs : NotBlank et Length(min=3) sur intitule.
     */
    public function testBlankIntitule(): void
    {
        $sport = (new Sports())
            ->setIntitule('')            // déclenche NotBlank + Length(min=3)
            ->setSlug('valid-slug')      // valeur valide → pas d'erreur sur le slug
            ->setBackgroundColor('#FFFFFF'); // valeur valide

        $this->assertHasErrors($sport, 2);
    }

    /**
     * Test d'un intitulé trop court (< 3 caractères).
     */
    public function testTooShortIntitule(): void
    {
        $sport = (new Sports())
            ->setIntitule('Hi')          // déclenche Length(min=3)
            ->setSlug('valid-slug')
            ->setBackgroundColor('#FFFFFF');

        $this->assertHasErrors($sport, 1);
    }

    /**
     * Test d'un intitulé trop long (> 150 caractères).
     */
    public function testTooLongIntitule(): void
    {
        $sport = (new Sports())
            ->setIntitule(str_repeat('A', 200)) // déclenche Length(max=150)
            ->setSlug('valid-slug')
            ->setBackgroundColor('#FFFFFF');

        $this->assertHasErrors($sport, 1);
    }

    /**
     * Test d'une couleur de fond invalide (non conforme au format hexadécimal).
     */
    public function testInvalidBackgroundColor(): void
    {
        $sport = (new Sports())
            ->setIntitule('Rugby_' . uniqid())
            ->setSlug('valid-slug')
            ->setBackgroundColor('rouge'); // format invalide

        $this->assertHasErrors($sport, 1);
    }

    /**
     * Test d'un slug trop court (< 3 caractères).
     */
    public function testTooShortSlug(): void
    {
        $sport = (new Sports())
            ->setIntitule('Tennis_' . uniqid())
            ->setSlug('ok')              // déclenche Length(min=3)
            ->setBackgroundColor('#FFFFFF');

        $this->assertHasErrors($sport, 1);
    }

    /**
     * Test d'un slug trop long (> 255 caractères).
     */
    public function testTooLongSlug(): void
    {
        $sport = (new Sports())
            ->setIntitule('Basketball_' . uniqid())
            ->setSlug(str_repeat('b', 300)) // déclenche Length(max=255)
            ->setBackgroundColor('#FFFFFF');

        $this->assertHasErrors($sport, 1);
    }
}
