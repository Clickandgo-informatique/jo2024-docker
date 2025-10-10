<?php
// src/Service/ReferenceGenerator.php

namespace App\Service;

use App\Entity\Commandes;
use Doctrine\Persistence\ManagerRegistry;

class ReferenceGenerator
{
    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function generate(): string
    {
        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        $length = 5;
        $repository = $this->doctrine->getRepository(Commandes::class);

        do {
            $random = '';
            for ($i = 0; $i < $length; $i++) {
                $random .= $characters[random_int(0, strlen($characters) - 1)];
            }
            $reference = sprintf('CMD-%s', $random);
            $existing = $repository->findOneBy(['reference' => $reference]);
        } while ($existing !== null);

        return $reference;
    }
}
