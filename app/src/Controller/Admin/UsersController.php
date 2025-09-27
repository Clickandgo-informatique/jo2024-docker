<?php

namespace App\Controller\Admin;

use App\Form\UserFormType;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/utilisateurs', 'app_utilisateurs')]
class UsersController extends AbstractController
{
    //Liste des utilisateurs par ordre ascendant
    #[Route('/', '_index')]
    public function index(UsersRepository $usersRepo, PaginatorInterface $paginator, Request $request): Response
    {
        $data = $usersRepo->createQueryBuilder('u')
            ->orderBy('u.nickname', 'ASC')
            ->getQuery();

        $utilisateurs = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            12
        );
   

        return $this->render('admin/utilisateurs/index.html.twig', ['utilisateurs' => $utilisateurs]);
    }

    //Modification d'un utilisateur
    #[Route('/edit/{id}', name: '_edit', requirements: ['id' => '\d+'])]
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
        }

        return $this->render('admin/utilisateurs/user-form.html.twig', [
            'form' => $form->createView(),
            'title' => $title,
            'utilisateur' => $utilisateur
        ]);
    }
}
