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

#[Route('/admin/utilisateurs', 'app_utilisateurs')]
class UsersController extends AbstractController
{
    // Liste des utilisateurs par ordre croissant
    #[Route('/', '_index')]
    public function index(UsersRepository $usersRepo, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $usersRepo->createQueryBuilder('u')
            ->orderBy('u.nickname', 'ASC')
            ->getQuery();

        $utilisateurs = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            12
        );

        return $this->render('admin/utilisateurs/index.html.twig', [
            'utilisateurs' => $utilisateurs,
        ]);
    }

    // Ajouter un nouvel utilisateur
    #[Route('/ajouter', name: '_ajouter', methods: ['GET', 'POST'])]
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

    // Modifier un utilisateur existant
    #[Route('/{id}/modifier', name: '_modifier', methods: ['GET', 'POST'], requirements: ['id' => '\d+'])]
    public function edit(UsersRepository $usersRepo, int $id, Request $request, EntityManagerInterface $em): Response
    {
        $utilisateur = $usersRepo->find($id);
        $title = "Modifier un utilisateur";

        $form = $this->createForm(UserFormType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($utilisateur);
            $em->flush();

            $this->addFlash('success', 'Les modifications ont bien été enregistrées dans la base.');
            return $this->redirectToRoute('app_utilisateurs_index');
        }

        return $this->render('admin/utilisateurs/user-form.html.twig', [
            'form' => $form->createView(),
            'title' => $title,
            'utilisateur' => $utilisateur,
        ]);
    }

    // Supprimer un utilisateur
    #[Route('/{id}/supprimer', name: '_supprimer', methods: ['POST'])]
    public function delete(Users $user, Request $request, EntityManagerInterface $em)
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
    //Recherche des utilisateurs par différents critères



    #[Route('/rechercher', name: '_rechercher')]
    public function rechercher(Request $request, UsersRepository $usersRepo, PaginatorInterface $paginator): JsonResponse
    {
        $searchString = trim((string) $request->get('searchString'));

        if ($searchString && mb_strlen($searchString, 'UTF-8') >= 2) {
            $data = $usersRepo->filterUsersBy($searchString);
        } else {
            $data = $usersRepo->findBy([], ['nickname' => 'ASC']);
        }
        $utilisateurs = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            12
        );


        if ($request->isXmlHttpRequest()) {

            $html = $this->renderView('_partials/_users-list.html.twig', [
                'utilisateurs' => $utilisateurs,
            ]);
            return new JsonResponse([
                'status' => 'success',
                'html'   => $html,
            ]);
        } else {
            return $this->render('users/index.html.twig', [
                'utilisateurs' => $utilisateurs,
            ]);
        }
    }
}
