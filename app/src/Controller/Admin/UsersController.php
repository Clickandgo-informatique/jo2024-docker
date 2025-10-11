<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use App\Form\UserFormType;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

// Définition du préfixe de route pour toutes les méthodes de ce contrôleur
#[Route(path: '/admin/utilisateurs', name: 'app_utilisateurs')]
class UsersController extends AbstractController
{
    // Affiche la liste des utilisateurs par ordre alphabétique
    #[Route(path: '/', name: '_index')]
    public function index(
        UsersRepository $usersRepo,
        PaginatorInterface $paginator,
        Request $request
    ): Response {
        // Création de la requête pour récupérer les utilisateurs par pseudo croissant
        $query = $usersRepo->createQueryBuilder('u')
            ->orderBy('u.nickname', 'ASC')
            ->getQuery();

        // Vérifie si on est en environnement de test
        $isTest = $this->getParameter('kernel.environment') === 'test';

        if ($isTest) {
            // En mode test, désactive la pagination : on récupère un simple tableau
            $utilisateurs = $query->getResult();
        } else {
            // En production, utilise KNP Paginator
            $utilisateurs = $paginator->paginate(
                $query,                          // requête Doctrine
                $request->query->getInt('page', 1), // page actuelle
                12                                // nombre d'éléments par page
            );
        }

        // Rend le template avec les utilisateurs et une variable indiquant si c'est un paginator
        return $this->render('admin/utilisateurs/index.html.twig', [
            'utilisateurs' => $utilisateurs,
            'isPaginator'  => !$isTest, // true si c'est un Paginator, false sinon
        ]);
    }



    // Crée un nouvel utilisateur via un formulaire
    #[Route(path: '/ajouter', name: '_ajouter', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        $utilisateur = new Users();
        $title = "Ajouter un utilisateur";

        $form = $this->createForm(UserFormType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $form->get('password')->getData();
            $utilisateur->setPassword($passwordHasher->hashPassword($utilisateur, $password));
            $utilisateur->setAccountKey(Uuid::v4()->toRfc4122());

            $em->persist($utilisateur);
            $em->flush();

            $this->addFlash('success', 'L’utilisateur a été créé avec succès.');
            return $this->redirectToRoute('app_utilisateurs_index');
        }

        return $this->render('admin/utilisateurs/user-form.html.twig', [
            'form' => $form->createView(),
            'title' => $title,
            'utilisateur' => $utilisateur,
        ]);
    }

    // Modifie un utilisateur existant
    #[Route(path: '/{id}/modifier', name: '_modifier', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function edit(UsersRepository $usersRepo, int $id, Request $request, EntityManagerInterface $em): Response
    {
        $utilisateur = $usersRepo->find($id);

        // Vérifie que l'utilisateur existe
        if (!$utilisateur) {
            throw $this->createNotFoundException("Utilisateur introuvable.");
        }

        $title = "Modifier un utilisateur";

        $form = $this->createForm(UserFormType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($utilisateur);
            $em->flush();

            $this->addFlash('success', 'Les modifications ont bien été enregistrées.');
            return $this->redirectToRoute('app_utilisateurs_index');
        }

        return $this->render('admin/utilisateurs/user-form.html.twig', [
            'form' => $form->createView(),
            'title' => $title,
            'utilisateur' => $utilisateur,
        ]);
    }

    // Supprime un utilisateur après validation du token CSRF
    #[Route(path: '/{id}/supprimer', name: '_supprimer', methods: ['POST'])]
    public function delete(Users $user, Request $request, EntityManagerInterface $em): Response
    {
        $submittedToken = $request->request->get('_token');

        if ($this->isCsrfTokenValid('delete-user' . $user->getId(), $submittedToken)) {
            $em->remove($user);
            $em->flush();
            $this->addFlash('success', 'Utilisateur supprimé avec succès.');
        } else {
            $this->addFlash('error', 'Token CSRF invalide. Suppression annulée.');
        }

        return $this->redirectToRoute('app_utilisateurs_index');
    }

    // Recherche des utilisateurs par pseudo, email ou nom
    #[Route(path: '/rechercher', name: '_rechercher')]
    public function rechercher(Request $request, UsersRepository $usersRepo, PaginatorInterface $paginator): JsonResponse
    {
        $searchString = trim((string) $request->get('searchString'));

        if ($searchString && mb_strlen($searchString, 'UTF-8') >= 2) {
            $data = $usersRepo->filterUsersBy($searchString);
        } else {
            $data = $usersRepo->findBy([], ['nickname' => 'ASC']);
        }

        // En environnement de test, désactive la pagination
        if ($this->getParameter('kernel.environment') === 'test') {
            $utilisateurs = $data;
        } else {
            $utilisateurs = $paginator->paginate(
                $data,
                $request->query->getInt('page', 1),
                12
            );
        }

        if ($request->isXmlHttpRequest()) {
            $html = $this->renderView('_partials/_users-list.html.twig', [
                'utilisateurs' => $utilisateurs,
            ]);

            return new JsonResponse([
                'status' => 'success',
                'html' => $html,
            ]);
        }

        return $this->render('users/index.html.twig', [
            'utilisateurs' => $utilisateurs,
        ]);
    }
}
