<?php

namespace App\Controller\Admin;

use App\Entity\CategoriesOffres;
use App\Form\CategoriesOffresFormType;
use App\Repository\CategoriesOffresRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

  #[Route('admin/offres/categories-offres', name: 'app_categories_offres')]
class CategoriesOffresController extends AbstractController
{
    //Liste des categories d'offres (administration)
    #[Route('/', name: '_index')]
    public function index(CategoriesOffresRepository $categoriesOffresRepo): Response
    {
        $categoriesOffres = $categoriesOffresRepo->findBy([], ['nom' => 'ASC']);
        return $this->render('admin/offres/categories-offres.html.twig', compact('categoriesOffres'));
    }

    //Créer une nouvelle catégorie d'offre
    #[Route('/ajout', name: '_new')]
    public function new(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $categorieOffres = new CategoriesOffres();

        $form = $this->createForm(CategoriesOffresFormType::class, $categorieOffres);
        $form->handleRequest($request);
        $title = "Créer une nouvelle catégorie d'offre";

        if ($form->isSubmitted() && $form->isValid()) {

            //On sluggifie sur le champ de formulaire "nom"
            $slug = $form->getData()->getNom();

            $categorieOffres->setSlug($slugger->slug(strtolower($slug)));
            $em->persist($categorieOffres);
            $em->flush();

            $this->addFlash('success', 'La nouvelle catégorie d\'offre a bien été enregistrée dans la base.');
            return $this->redirectToRoute('app_categories_offres_index');
        }

        return $this->render('admin/offres/categories-offres-form.html.twig', ['form' => $form->createView(), 'title' => $title]);
    }

    //Modifier une categorie d'offre (administration)
    #[Route('/{slug}/edit', name: '_edit')]
    public function edit(CategoriesOffresRepository $categoriesOffresRepo, string $slug, Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $categorieOffres = $categoriesOffresRepo->findOneBy(['slug' => $slug]);
        $title = "Modifier une catégorie d'offre";

        $form = $this->createForm(CategoriesOffresFormType::class, $categorieOffres);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //On sluggifie sur le champ de formulaire "nom"
            $slug = $form->getData()->getNom();

            $categorieOffres->setSlug($slugger->slug(strtolower($slug)));
            $em->persist($categorieOffres);
            $em->flush();

            $this->addFlash('success', 'Les modifications ont bien été enregistrées dans la base.');
            return $this->redirectToRoute('app_categories_offres_index');
        }

        return $this->render('admin/offres/categories-offres-form.html.twig', ['form' => $form->createView(), 'title' => $title]);
    }
    // Supprimer une catégorie d'offre
    // Supprimer un utilisateur
    #[Route('/{id}/supprimer', name: '_supprimer', methods: ['POST'])]
    public function delete(CategoriesOffres $categorie, Request $request, EntityManagerInterface $em)
    {
        $submittedToken = $request->request->get('_token');

        if ($this->isCsrfTokenValid('delete-categorie' . $categorie->getId(), $submittedToken)) {
            $em->remove($categorie);
            $em->flush();
            $this->addFlash('success', 'La catégorie d\'offre a été supprimée avec succès.');
        } else {
            $this->addFlash('error', 'Token CSRF invalide. Suppression annulée.');
        }

        return $this->redirectToRoute('app_categories_offres_index');
    }
}
