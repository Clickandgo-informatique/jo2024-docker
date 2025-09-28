<?php
// PanierController.php

namespace App\Controller;

use App\Entity\Offres;
use App\Repository\OffresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/panier', name: 'panier_')]
class PanierController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(Request $request, SessionInterface $session, OffresRepository $offresRepo): Response|JsonResponse
    {
        return $this->renderCart($session, $offresRepo, $request);
    }

    #[Route('/add/{id}', name: 'add', methods: ['POST'])]
    public function add(Offres $offre, SessionInterface $session, OffresRepository $offresRepo, Request $request): Response|JsonResponse
    {
        $panier = $session->get('panier', []);
        $id = $offre->getId();
        $panier[$id] = ($panier[$id] ?? 0) + 1;
        $session->set('panier', $panier);

        if ($request->isXmlHttpRequest()) {
            return $this->renderCart($session, $offresRepo, $request);
        }

        return $this->redirectToRoute('panier_index');
    }

    #[Route('/remove/{id}', name: 'remove', methods: ['POST'])]
    public function remove(Offres $offre, SessionInterface $session, OffresRepository $offresRepo, Request $request): Response|JsonResponse
    {
        $panier = $session->get('panier', []);
        $id = $offre->getId();

        if (isset($panier[$id])) {
            unset($panier[$id]);
            $session->set('panier', $panier);
        }

        return $this->renderCart($session, $offresRepo, $request);
    }

    #[Route('/update/{id}', name: 'update', methods: ['POST'])]
    public function update(Offres $offre, Request $request, SessionInterface $session, OffresRepository $offresRepo): Response|JsonResponse
    {
        $panier = $session->get('panier', []);
        $id = $offre->getId();
        $quantite = max(1, (int) $request->request->get('quantite', 1));
        $panier[$id] = $quantite;
        $session->set('panier', $panier);

        return $this->renderCart($session, $offresRepo, $request);
    }

    #[Route('/clear', name: 'clear', methods: ['POST'])]
    public function clear(SessionInterface $session, OffresRepository $offresRepo, Request $request): Response|JsonResponse
    {
        $session->remove('panier');
        return $this->renderCart($session, $offresRepo, $request);
    }

    #[Route('/count', name: 'count', methods: ['GET'])]
    public function count(SessionInterface $session): JsonResponse
    {
        $panier = $session->get('panier', []);
        return $this->json([
            'success' => true,
            'cartCount' => array_sum($panier)
        ]);
    }

    private function renderCart(SessionInterface $session, OffresRepository $offresRepo, ?Request $request): Response|JsonResponse
    {
        $panier = $session->get('panier', []);
        $data = $this->getCartData($panier, $offresRepo);
        $totalItems = array_sum($panier);
        $total = $this->getCartTotal($panier, $offresRepo);

        if ($request?->isXmlHttpRequest()) {
            return $this->json([
                'success' => true,
                'cartCount' => $totalItems,
                'html' => $this->renderView('_partials/_cart-items.html.twig', [
                    'panier' => $panier,
                    'data' => $data,
                    'totalItems' => $totalItems,
                    'total' => $total,
                ]),
            ]);
        }

        return $this->render('panier/index.html.twig', [
            'panier' => $panier,
            'data' => $data,
            'totalItems' => $totalItems,
            'total' => $total,
        ]);
    }

    private function getCartData(array $panier, OffresRepository $offresRepo): array
    {
        if (empty($panier)) return [];

        $offres = $offresRepo->findBy(['id' => array_keys($panier)]);
        $data = [];

        foreach ($offres as $offre) {
            $id = $offre->getId();
            $quantite = $panier[$id] ?? 0;
            $data[] = [
                'offre' => $offre,
                'quantite' => $quantite,
                'total' => $offre->getPrix() * $quantite,
            ];
        }

        return $data;
    }

    private function getCartTotal(array $panier, OffresRepository $offresRepo): float
    {
        if (empty($panier)) return 0;

        $offres = $offresRepo->findBy(['id' => array_keys($panier)]);
        $total = 0;

        foreach ($offres as $offre) {
            $id = $offre->getId();
            $quantite = $panier[$id] ?? 0;
            $total += $offre->getPrix() * $quantite;
        }

        return $total;
    }

    #[Route('/valider', name: 'validate', methods: ['POST'])]
    public function validateCart(SessionInterface $session): Response
    {
        $user = $this->getUser();

        if (!$user || !$session->get('2fa_passed', false)) {
            $this->addFlash('error', 'Vous devez passer la double authentification avant de valider le panier.');
            return $this->redirectToRoute('2fa_verify');
        }

        $panier = $session->get('panier', []);
        if (empty($panier)) {
            $this->addFlash('warning', 'Votre panier est vide.');
            return $this->redirectToRoute('panier_index');
        }

        $session->remove('panier');
        $this->addFlash('success', 'Votre panier a été validé avec succès.');

        return $this->redirectToRoute('panier_index');
    }
}
