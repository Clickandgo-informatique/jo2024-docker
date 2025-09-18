<?php

namespace App\Tests\Entity;

use App\Entity\Sports;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SportsValidationTest extends KernelTestCase
{
    private function getValidator()
    {
        self::bootKernel();
        return static::getContainer()->get('validator');
    }

    private function assertHasErrors(Sports $sport, int $expectedErrorCount): void
    {
        $validator = $this->getValidator();
        $errors = $validator->validate($sport);

        $messages = [];
        foreach ($errors as $error) {
            $messages[] = $error->getPropertyPath().' => '.$error->getMessage();
        }

        $this->assertCount($expectedErrorCount, $errors, implode("\n", $messages));
    }

    public function testValidSport(): void
    {
        $sport = (new Sports())
            ->setIntitule('Handball')
            ->setIcone('hand.png')
            ->setBackgroundColor('#FF0000')
            ->setSlug('handball');

        $this->assertHasErrors($sport, 0);
    }

    public function testBlankIntitule(): void
    {
        $sport = (new Sports())
            ->setIntitule('')
            ->setSlug('ok');

        $this->assertHasErrors($sport, 1);
    }

    public function testTooShortIntitule(): void
    {
        $sport = (new Sports())
            ->setIntitule('Hi') // 2 caractères < min 3
            ->setSlug('valid-slug');

        $this->assertHasErrors($sport, 1);
    }

    public function testTooLongIntitule(): void
    {
        $sport = (new Sports())
            ->setIntitule(str_repeat('A', 200)); // > 150
        $this->assertHasErrors($sport, 1);
    }

    public function testInvalidBackgroundColor(): void
    {
        $sport = (new Sports())
            ->setIntitule('Rugby')
            ->setBackgroundColor('rouge'); // pas un code hex

        $this->assertHasErrors($sport, 1);
    }

    public function testTooShortSlug(): void
    {
        $sport = (new Sports())
            ->setIntitule('Tennis')
            ->setSlug('ok'); // 2 caractères < min 3

        $this->assertHasErrors($sport, 1);
    }

    public function testTooLongSlug(): void
    {
        $sport = (new Sports())
            ->setIntitule('Basketball')
            ->setSlug(str_repeat('b', 300)); // > 255

        $this->assertHasErrors($sport, 1);
    }
}
