<?php

namespace App\Tests\Entity;

use App\Entity\Sports;
use App\Entity\Offres;
use PHPUnit\Framework\TestCase;

class SportsTest extends TestCase
{
    public function testGettersAndSetters(): void
    {
        $sport = new Sports();

        $sport->setIntitule('Football');
        $this->assertSame('Football', $sport->getIntitule());

        $sport->setIcone('icon.png');
        $this->assertSame('icon.png', $sport->getIcone());

        $sport->setBackgroundColor('#FFFFFF');
        $this->assertSame('#FFFFFF', $sport->getBackgroundColor());

        $sport->setSlug('football');
        $this->assertSame('football', $sport->getSlug());
    }

    public function testAddOffre(): void
    {
        $sport = new Sports();
        $offre = $this->createMock(Offres::class);

        $offre->expects($this->once())
              ->method('addSport')
              ->with($sport);

        $sport->addOffre($offre);

        $this->assertCount(1, $sport->getOffres());
        $this->assertTrue($sport->getOffres()->contains($offre));
    }

    public function testAddOffreDoesNotDuplicate(): void
    {
        $sport = new Sports();
        $offre = $this->createMock(Offres::class);

        $offre->expects($this->once())
              ->method('addSport')
              ->with($sport);

        $sport->addOffre($offre);
        $sport->addOffre($offre); // doublon

        $this->assertCount(1, $sport->getOffres());
    }

    public function testRemoveOffre(): void
    {
        $sport = new Sports();
        $offre = $this->createMock(Offres::class);

        $offre->expects($this->once())
              ->method('removeSport')
              ->with($sport);

        $sport->addOffre($offre);
        $sport->removeOffre($offre);

        $this->assertCount(0, $sport->getOffres());
    }
}
