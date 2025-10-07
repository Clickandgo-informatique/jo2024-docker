<?php

namespace App\Controller\Admin;

use App\Repository\CommandesRepository;
use App\Repository\TicketsRepository;
use App\Form\MockPaymentType;
use App\Entity\Tickets;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Contrôleur pour le paiement simulé et la gestion des tickets.
 *
 * Rôles :
 * - Simulation de paiement pour une commande existante
 * - Création d’un ticket sécurisé (ticketKey + payloadHash)
 * - Redirection vers la page HTML du ticket (template ticket-show.html.twig)
 */
class MockPaymentController extends AbstractController
{
    /**
     * Simulation d’un paiement pour une commande existante.
     *
     * Workflow :
     * 1. Vérifie que l’utilisateur est connecté
     * 2. Vérifie que la commande existe et appartient à l’utilisateur
     * 3. Affiche le formulaire de paiement simulé (MockPaymentType)
     * 4. Si formulaire valide :
     *    - Marque la commande comme payée
     *    - Génère un ticket unique
     *    - Redirige vers la page HTML du ticket
     *
     * @Route("/mock/payment/{id}", name="app_paiement_commande", methods={"GET","POST"}, requirements={"id"="\d+"})
     */
    #[Route(path: '/mock/payment/{id}', name: 'app_paiement_commande', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function payerCommande(
        int $id,
        CommandesRepository $commandesRepo,
        TicketsRepository $ticketsRepo,
        \Doctrine\ORM\EntityManagerInterface $em,
        Request $request
    ): Response {
        // 🔐 Vérifie que l’utilisateur est connecté
        $this->denyAccessUnlessGranted('ROLE_USER');

        /** @var \App\Entity\Users|null $user */
        $user = $this->getUser();
        if (!$user) {
            throw $this->createAccessDeniedException('Utilisateur non reconnu.');
        }

        // 🔍 Récupération de la commande
        $commande = $commandesRepo->find($id);
        if (!$commande || $commande->getUser()?->getId() !== $user->getId()) {
            $this->addFlash('error', 'Commande introuvable ou non autorisée.');
            return $this->redirectToRoute('app_commandes_liste');
        }

        // 💳 Création du formulaire de paiement simulé
        $form = $this->createForm(MockPaymentType::class);
        $form->handleRequest($request);

        // 🚀 Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Vérifie si un ticket existe déjà
            $existingTicket = $ticketsRepo->findOneBy(['commande' => $commande]);
            if ($existingTicket) {
                $this->addFlash('info', 'Un ticket existe déjà pour cette commande.');
                return $this->redirectToRoute('app_ticket_show', [
                    'ticketKey' => $existingTicket->getTicketKey()
                ]);
            }

            // ✅ Marque la commande comme payée
            $commande->setPayeeLe(new \DateTimeImmutable());

            // 🔑 Génération du ticket unique
            $ticketKey = bin2hex(random_bytes(32));
            $payloadHash = hash('sha256', $ticketKey . $commande->getId() . bin2hex(random_bytes(8)));

            // 🎟️ Création du ticket
            $ticket = new Tickets();
            $ticket->setTicketKey($ticketKey);
            $ticket->setPayloadHash($payloadHash);
            $ticket->setCommande($commande);
            $ticket->setQrcodePath('/ticket/' . $ticketKey); // référence URL pour QR code

            // 💾 Persistance en base
            $em->persist($ticket);
            $em->persist($commande);
            $em->flush();

            // ✅ Flash et redirection vers la page HTML du ticket
            $this->addFlash('success', 'Paiement simulé avec succès — ticket créé.');
            return $this->redirectToRoute('app_ticket_show', [
                'ticketKey' => $ticketKey
            ]);
        }

        // 🧾 Affichage du formulaire de paiement simulé
        return $this->render('commandes/mock-payment-form.html.twig', [
            'commande' => $commande,
            'form' => $form->createView()
        ]);
    }
}
