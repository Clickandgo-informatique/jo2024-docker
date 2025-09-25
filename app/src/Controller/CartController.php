<?php

namespace App\Controller;

use App\Entity\Offres;
use App\Repository\OffresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cart', name: 'app_cart_')]
class CartController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(SessionInterface $session, OffresRepository $offresRepo)
    {
        $panier = $session->get('panier', []);
        $data = [];
        $total = 0;
        $totalItems = array_sum($panier);

        foreach ($panier as $id => $qty) {
            $offre = $offresRepo->find($id);
            if ($offre) {
                $data[] = ['offre' => $offre, 'quantite' => $qty];
                $total += $offre->getPrix() * $qty;
            }
        }

        return $this->render('cart/index.html.twig', compact('data', 'total', 'totalItems'));
    }
    //Ajouter un article / offre
    #[Route('/add/{id}', name: 'add', methods: ['POST'])]
    public function add(Offres $offre, SessionInterface $session, OffresRepository $offresRepo): JsonResponse
    {
        $panier = $session->get('panier', []);
        $id = $offre->getId();
        $panier[$id] = ($panier[$id] ?? 0) + 1;
        $session->set('panier', $panier);

        return $this->json([
            'success' => true,
            'cartCount' => array_sum($panier),
            'html' => $this->renderView('cart/_cart_items.html.twig', [
                'cart' => $panier,
                'data' => $this->getCartData($panier, $offresRepo),
                'totalItems' => array_sum($panier),
                'total' => $this->getCartTotal($panier, $offresRepo),
            ]),
        ]);
    }

    #[Route('/remove/{id}', name: 'remove', methods: ['POST'])]
    public function remove(int $id, SessionInterface $session, OffresRepository $offresRepo): JsonResponse
    {
        $panier = $session->get('panier', []);
        if (!empty($panier[$id])) {
            $panier[$id]--;
            if ($panier[$id] <= 0) {
                unset($panier[$id]);
            }
        }
        $session->set('panier', $panier);

        return $this->json([
            'success' => true,
            'cartCount' => array_sum($panier),
            'html' => $this->renderView('cart/_cart_items.html.twig', [
                'cart' => $panier,
                'data' => $this->getCartData($panier, $offresRepo),
                'totalItems' => array_sum($panier),
                'total' => $this->getCartTotal($panier, $offresRepo),
            ]),
        ]);
    }

    #[Route('/count', name: 'count', methods: ['GET'])]
    public function count(SessionInterface $session, OffresRepository $offresRepo): JsonResponse
    {
        $panier = $session->get('panier', []);
        return $this->json([
            'success' => true,
            'cartCount' => array_sum($panier),
            'html' => $this->renderView('cart/_cart_items.html.twig', [
                'cart' => $panier,
                'data' => $this->getCartData($panier, $offresRepo),
                'totalItems' => array_sum($panier),
                'total' => $this->getCartTotal($panier, $offresRepo),
            ]),
        ]);
    }
    //obtenir data concernant le panier
    private function getCartData(array $panier, OffresRepository $repo): array
    {
        $data = [];
        foreach ($panier as $id => $qty) {
            $offre = $repo->find($id);
            if ($offre) $data[] = ['offre' => $offre, 'quantite' => $qty];
        }
        return $data;
    }
    //Calcul du total
    private function getCartTotal(array $panier, OffresRepository $repo): float
    {
        $total = 0;
        foreach ($panier as $id => $qty) {
            $offre = $repo->find($id);
            if ($offre) $total += $offre->getPrix() * $qty;
        }
        return $total;
    }
    // Vidage du panier
    #[Route('/empty', name: 'empty', methods: ['POST'])]
    public function emptyCart(SessionInterface $session): JsonResponse
    {
        $session->remove('panier');

        return $this->json([
            'success' => true,
            'cartCount' => 0,
            'html' => $this->renderView('cart/_cart_items.html.twig', [
                'cart' => [],
                'data' => [],
                'totalItems' => 0,
                'total' => 0,
            ]),
        ]);
    }
}
