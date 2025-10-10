<?php

namespace App\Controller;

use App\Entity\Offres;
use App\Repository\OffresRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/panier', name: 'panier_')]
class PanierController extends AbstractController
{
    /**
     * Affiche le contenu du panier.
     * Supporte le rendu normal ou AJAX (HTML partiel renvoyé en JSON).
     */
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(Request $request, SessionInterface $session, OffresRepository $offresRepo): Response|JsonResponse
    {
        return $this->renderCart($session, $offresRepo, $request);
    }

    /**
     * Ajoute une offre au panier. Si l'offre existe déjà, incrémente sa quantité.
     * Supporte AJAX pour mise à jour dynamique.
     */
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

    /**
     * Supprime une offre du panier.
     * Si l'offre n'existe pas, aucune action n'est effectuée.
     * Supporte AJAX pour mise à jour dynamique.
     */
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

    /**
     * Met à jour la quantité d'une offre dans le panier.
     * La quantité minimale est 1.
     * Supporte AJAX pour mise à jour dynamique.
     */
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

    /**
     * Vide complètement le panier.
     * Supporte AJAX pour mise à jour dynamique.
     */
    #[Route('/clear', name: 'clear', methods: ['POST'])]
    public function clear(SessionInterface $session, OffresRepository $offresRepo, Request $request): Response|JsonResponse
    {
        $session->remove('panier');
        return $this->renderCart($session, $offresRepo, $request);
    }

    /**
     * Retourne le nombre total d'articles dans le panier pour mise à jour AJAX.
     */
    #[Route('/count', name: 'count', methods: ['GET'])]
    public function count(SessionInterface $session): JsonResponse
    {
        $panier = $session->get('panier', []);
        return $this->json([
            'success' => true,
            'cartCount' => array_sum($panier)
        ]);
    }

    /**
     * Méthode interne pour générer la vue du panier.
     * Supporte AJAX (JSON avec HTML) ou rendu normal.
     */
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

    /**
     * Méthode interne pour récupérer les détails complets des offres dans le panier.
     */
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

    /**
     * Méthode interne pour calculer le total du panier.
     */
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

    /**
     * Valide le panier et crée la commande correspondante.
     * Vide le panier après création.
     */
    #[Route('/valider', name: 'validate', methods: ['POST'])]
    public function validateCart(SessionInterface $session, EntityManagerInterface $em, OffresRepository $offresRepo): Response
    {
        /** @var \App\Entity\Users $user */
        $user = $this->getUser();
        if (!$user) {
            throw $this->createAccessDeniedException('Utilisateur non reconnu.');
        }

        $panier = $session->get('panier', []);
        if (empty($panier)) {
            $this->addFlash('warning', 'Votre panier est vide.');
            return $this->redirectToRoute('panier_index');
        }

        $commande = new \App\Entity\Commandes();
        $commande->setUser($user);
        $commande->setCreatedAt(new \DateTimeImmutable());
        $commande->setReference(uniqid());

        foreach ($panier as $offreId => $quantite) {
            $offre = $offresRepo->find($offreId);
            if (!$offre) continue;

            $details = new \App\Entity\DetailsCommandes();
            $details->setOffres($offre)
                ->setQuantite($quantite)
                ->setPrix($offre->getPrix())
                ->setCommande($commande);

            $em->persist($details);
            $commande->addDetailsCommande($details);
        }

        $em->persist($commande);
        $em->flush();

        $session->remove('panier');

        $this->addFlash('success', 'Commande créée ! Vous pouvez maintenant procéder au paiement.');

        return $this->redirectToRoute('app_commandes_liste-commandes-client', ['id' => $commande->getUser()->getId()]);
    }
}
