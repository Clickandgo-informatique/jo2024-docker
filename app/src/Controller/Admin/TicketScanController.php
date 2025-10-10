<?php

namespace App\Controller\Admin;

use App\Repository\TicketsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TicketScanController extends AbstractController
{

    #[Route('/admin/tickets/scan', name: 'admin_tickets_scan', methods: ['GET'])]
    public function scan(Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', 'ROLE_SALES_MANAGER');

        $ticketKey = $request->query->get('ticketKey');
        return $this->render('tickets/scan.html.twig', ['ticketKey' => $ticketKey]);
    }

    //Vérification d'un ticket
    #[Route('/admin/tickets/verify', name: 'admin_tickets_verify', methods: ['POST'])]
    public function verify(
        Request $request,
        TicketsRepository $ticketsRepository,
        EntityManagerInterface $em,
        LoggerInterface $logger
    ): JsonResponse {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        // CSRF header check
        if (!$this->isCsrfTokenValid('verify_ticket', $request->headers->get('X-CSRF-TOKEN'))) {
            return $this->json(['status' => 'error', 'message' => 'Jeton CSRF invalide.'], 403);
        }

        $data = json_decode($request->getContent(), true);
        $ticketKey = $data['ticketKey'] ?? null;
        if (!$ticketKey) {
            return $this->json(['status' => 'error', 'message' => 'ticketKey manquant.'], 400);
        }

        $ticket = $ticketsRepository->findOneBy(['ticketKey' => $ticketKey]);
        if (!$ticket) {
            return $this->json(['status' => 'not_found', 'message' => 'Ticket inconnu.'], 404);
        }

        // Déjà scanné ?
        if ($ticket->getUsedAt()) {
            return $this->json([
                'status' => 'already_used',
                'message' => 'Ticket déjà scanné le ' . $ticket->getUsedAt()->format('Y-m-d H:i:s'),
            ], 409);
        }

        // Expiré ?
        if ($ticket->getExpiresAt() && $ticket->getExpiresAt() < new \DateTimeImmutable()) {
            return $this->json([
                'status' => 'expired',
                'message' => 'Ticket expiré le ' . $ticket->getExpiresAt()->format('Y-m-d H:i:s'),
            ], 410);
        }

        // Optionnel: vérifier payloadHash / autres vérifications ici

        // Marquer comme validé
        $ticket->setUsedAt(new \DateTimeImmutable());
        $ticket->setValidatedBy($this->getUser()?->getUserIdentifier() ?? 'admin');
        $em->persist($ticket);
        $em->flush();

        $logger->info('Ticket validé', [
            'ticketId' => method_exists($ticket, 'getId') ? $ticket->getId() : null,
            'ticketKey' => $ticketKey,
            'by' => $this->getUser()?->getUserIdentifier() ?? 'admin',
        ]);

        // Renvoyer quelques infos utiles (sécuriser selon besoin)
        return $this->json([
            'status' => 'ok',
            'message' => 'Ticket validé.',
            'ticket' => [
                'id' => method_exists($ticket, 'getId') ? $ticket->getId() : null,

            ],
        ]);
    }
}
