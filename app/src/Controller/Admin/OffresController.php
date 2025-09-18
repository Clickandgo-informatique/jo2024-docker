<?php

namespace App\Controller\Admin;

use App\Entity\Offres;
use App\Form\OffresFormType;
use App\Repository\CategoriesOffresRepository;
use App\Repository\OffresRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;


final class OffresController extends AbstractController
{
    //Liste des offres dans le backend
    #[Route('admin/offres', name: 'app_offres_index')]
    public function index(OffresRepository $offresRepo, Request $request, PaginatorInterface $paginator)
    {

        $data = $offresRepo->findBy([], ['intitule' => 'ASC']);

        $offres = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            12
        );
        return $this->render('admin/offres/index.html.twig', [
            'offres' => $offres,
        ]);
    }

    //Catalogue des offres de tickets pour les clients 
    #[Route('/catalogue-offres-clients', 'app_offres_catalogue')]
    public function catalogue(OffresRepository $offresRepo, Request $request, PaginatorInterface $paginator, CategoriesOffresRepository $categoriesOffresRepo): Response
    {
        $categoriesOffres = $categoriesOffresRepo->findBy([], ['nom' => 'ASC']);

        $data = $offresRepo->findBy(['isPublished' => true], ['date_debut' => 'ASC']);

        $offres = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            12
        );

        // 👉 Si requête AJAX → JSON
        if ($request->isXmlHttpRequest()) {
            $html = $this->renderView('_partials/_catalogue-offres-clients.html.twig', [
                'offres' => $offres,
            ]);

            return new JsonResponse([
                'status' => 'success',
                'html'   => $html,
            ]);
        }

        // 👉 Sinon → page complète (avec catégories, SEO…)
        return $this->render('offres/catalogue-offres-clients.html.twig', [
            'offres' => $offres,
            'categoriesOffres' => $categoriesOffres,
        ]);
    }

    //Créer une offre
    #[Route('admin/offres/ajout', name: 'app_offres_new')]
    public function new(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $offre = new Offres();
        $title = "Créer une offre";
        $form = $this->createForm(OffresFormType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //On sluggifie sur le champ de formulaire "intitule"
            $slug = $form->get('intitule')->getData();

            $offre->setSlug($slugger->slug($slug));
            $em->persist($offre);
            $em->flush();

            $this->addFlash('success', "L'offre a bien été enregistrée dans la base.");
            return $this->redirectToRoute('app_offres_index');
        }
        return $this->render('admin/offres/edit.html.twig', [
            'offre' => $offre,
            'title' => $title,
            'form' => $form->createView(),
        ]);
    }

    //Édition d'une offre
    #[Route('admin/edit/{slug}', name: 'app_offres_edit')]
    public function edit(OffresRepository $offresRepo, string $slug, Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $offre = $offresRepo->findOneBy(['slug' => $slug]);
        if (!$offre) {
            throw $this->createNotFoundException("Offre non trouvée");
        }
        $title = "Modifier une offre";
        $form = $this->createForm(OffresFormType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //On sluggifie sur le champ de formulaire "intitule"
            $slug = $form->get('intitule')->getData();

            $offre->setSlug($slugger->slug($slug));
            $em->persist($offre);
            $em->flush();

            $this->addFlash('success', "L'offre a bien été modifiée.");
            return $this->redirectToRoute('app_offres_index');
        }

        //On vérifie que l'utilisateur est admin
        if (!$this->isGranted('ROLE_ADMIN')) {
            $this->addFlash('danger', "Vous n'avez pas le droit d'accéder à cette page sans vous être connecté en tant qu'administrateur.");
            return $this->redirectToRoute('app_login');
        }
        return $this->render('admin/offres/edit.html.twig', [
            'offre' => $offre,
            'title' => $title,
            'form' => $form->createView(),
        ]);
    }

    // Filtrer les offres par catégorie dans le front-end (catalogue client)
    #[Route('/offres-par-categorie/{slug}', name: 'app_offres-par-categories')]
    public function filter(
        Request $request,
        OffresRepository $offresRepo,
        string $slug,
        PaginatorInterface $paginator
    ): JsonResponse|Response {
        
        $data = $offresRepo->getOffresParCategories($slug);

        $offres = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            12
        );

        // 👉 Si la requête est AJAX → on renvoie JSON avec HTML (cartes + pagination)
        if ($request->isXmlHttpRequest()) {
            $html = $this->renderView('_partials/_catalogue-offres-clients.html.twig', [
                'offres' => $offres,
            ]);

            $pagination = $this->renderView('_partials/_pagination-offres.html.twig', [
                'offres' => $offres,
            ]);

            return new JsonResponse([
                'status' => 'success',
                'html'   => $html . $pagination, // 👉 un seul bloc complet
            ]);
        }

        // 👉 Sinon (requête classique), on renvoie la page entière avec le layout
        return $this->render('offres/catalogue-offres-clients.html.twig', [
            'offres'    => $offres,
            'categorie' => $slug,
        ]);
    }
}
