<?php

namespace App\DataFixtures;

use App\Entity\CategoriesOffres;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesOffresFixtures extends Fixture
{
    private $slugger;
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }
    public function load(ObjectManager $manager): void
    {
        $tblCategories = ["Duo", "Familiale", "Solo", "Groupe"];
 
        foreach ($tblCategories as $cat) {
            $categorie = new CategoriesOffres();
            $categorie->setNom($cat);
            $categorie->setSlug($this->slugger->slug(strtolower($categorie->getNom())));           
            
            $manager->persist($categorie);        
        }

        $manager->flush();
    }
}
