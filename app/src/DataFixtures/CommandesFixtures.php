<?php

namespace App\DataFixtures;

use App\Entity\Commandes;
use App\Entity\DetailsCommandes;
use App\Entity\Offres;
use App\Entity\Tickets;
use App\Entity\Users;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CommandesFixtures extends Fixture implements DependentFixtureInterface
{
    private Generator $faker;
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->faker = Factory::create('fr_FR');
        $this->urlGenerator = $urlGenerator;
    }

    public function load(ObjectManager $manager): void
    {
        $existingKeys = [];

        $users = $manager->getRepository(Users::class)->findAll();
        $offres = $manager->getRepository(Offres::class)->findAll();

        for ($i = 0; $i < 100; $i++) {
            $commande = new Commandes();
            $user = $this->faker->randomElement($users);

            $commande->setUser($user)
                     ->setPayeeLe(new DateTimeImmutable())
                     ->setCreatedAt(new DateTimeImmutable())
                     ->setReference($this->faker->unique()->bothify('##############'));

            // Détails commande
            $numDetails = random_int(1, 5);
            $usedOffres = [];
            for ($j = 0; $j < $numDetails; $j++) {
                $details = new DetailsCommandes();
                do {
                    $offre = $this->faker->randomElement($offres);
                } while (in_array($offre->getId(), $usedOffres));
                $usedOffres[] = $offre->getId();

                $details->setOffres($offre)
                        ->setPrix($offre->getPrix())
                        ->setQuantite(random_int(1, 5));

                $commande->addDetailsCommande($details);
            }

            // Ticket unique
            do {
                $ticketKey = bin2hex(random_bytes(32));
            } while (in_array($ticketKey, $existingKeys));
            $existingKeys[] = $ticketKey;

            $ticket = new Tickets();
            $ticket->setCreatedAt(new DateTimeImmutable())
                   ->setUser($user)
                   ->setCommande($commande)
                   ->setTicketKey($ticketKey)
                   ->setPayloadHash(hash('sha256', $user->getAccountKey() . $ticketKey));

            // URL sécurisée pour QR code
            $ticketUrl = $this->urlGenerator->generate('app_ticket_show', [
                'ticketKey' => $ticketKey
            ], UrlGeneratorInterface::ABSOLUTE_URL);
            $ticket->setQrCodePath($ticketUrl);

            $manager->persist($ticket);
            $commande->setTicket($ticket);
            $manager->persist($commande);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UsersFixtures::class,
            OffresFixtures::class,
        ];
    }
}
