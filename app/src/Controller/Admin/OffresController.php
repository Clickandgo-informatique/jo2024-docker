<?php
// OffresController.php

namespace App\Controller\Admin;

use App\Entity\CategoriesOffres;
use App\Entity\Offres;
use App\Form\OffresFormType;
use App\Repository\CategoriesOffresRepository;
use App\Repository\OffresRepository;
use App\Repository\SportsRepository;
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
    // Liste des offres dans le backend
    #[Route('admin/offres', name: 'app_offres_index')]
    public function index(
        OffresRepository $offresRepo,
        Request $request,
        PaginatorInterface $paginator
    ): Response {
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

    // Catalogue des offres de tickets pour les clients 
    #[Route('/catalogue-offres-clients', name: 'app_offres_catalogue')]
    public function catalogue(
        OffresRepository $offresRepo,
        Request $request,
        PaginatorInterface $paginator,
        CategoriesOffresRepository $categoriesOffresRepo,
        SportsRepository $sportRepo
    ): Response {
        $categoriesOffres = $categoriesOffresRepo->findBy([], ['nom' => 'ASC']);
        $sports = $sportRepo->findSportsInOffres();

        $data = $offresRepo->findBy(['isPublished' => true], ['dateDebut' => 'ASC']);

        $offres = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            12
        );

        // Si AJAX → on renvoie uniquement le wrapper
        if ($request->isXmlHttpRequest()) {
            $html = $this->renderView('_partials/_catalogue-offres-ajax-wrapper.html.twig', [
                'offres' => $offres,
            ]);

            return new JsonResponse([
                'status' => 'success',
                'html'   => $html,
            ]);
        }

        // Sinon, rendu complet avec layout
        return $this->render('offres/catalogue-offres-clients.html.twig', [
            'offres'           => $offres,
            'categoriesOffres' => $categoriesOffres,
            'sports'           => $sports,
            'selectedSlugs'    => [], // aucune sélection par défaut
        ]);
    }

    // Filtrer les offres par catégorie dans le front-end (catalogue client)
    #[Route('/offres-par-categorie/{slug}', name: 'app_offres-par-categories')]
    public function filterByCategorie(
        Request $request,
        OffresRepository $offresRepo,
        CategoriesOffresRepository $categoriesOffresRepo,
        SportsRepository $sportRepo,
        string $slug,
        PaginatorInterface $paginator
    ): JsonResponse|Response {
        $data = $offresRepo->getOffresParCategories($slug);

        $offres = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            12
        );

        $categoriesOffres = $categoriesOffresRepo->findBy([], ['nom' => 'ASC']);
        $sports = $sportRepo->findSportsInOffres();

        // Si AJAX → on renvoie uniquement le wrapper
        if ($request->isXmlHttpRequest()) {
            $html = $this->renderView('_partials/_catalogue-offres-ajax-wrapper.html.twig', [
                'offres' => $offres,
            ]);

            return new JsonResponse([
                'status' => 'success',
                'html'   => $html,
            ]);
        }

        // Sinon, rendu complet avec layout
        return $this->render('offres/catalogue-offres-clients.html.twig', [
            'offres'           => $offres,
            'categorie'        => $slug,
            'categoriesOffres' => $categoriesOffres,
            'sports'           => $sports,
            'selectedSlugs'    => [], // pas de filtres sports ici
        ]);
    }

    // Créer une offre
    #[Route('admin/offres/ajout', name: 'app_offres_new')]
    public function new(
        Request $request,
        EntityManagerInterface $em,
        SluggerInterface $slugger
    ): Response {
        $offre = new Offres();
        $title = "Créer une offre";

        $form = $this->createForm(OffresFormType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $slug = $form->get('intitule')->getData();
            $offre->setSlug($slugger->slug($slug));

            $em->persist($offre);
            $em->flush();

            $this->addFlash('success', "L'offre a bien été enregistrée.");
            return $this->redirectToRoute('app_offres_index');
        }

        return $this->render('admin/offres/edit.html.twig', [
            'offre' => $offre,
            'title' => $title,
            'form'  => $form->createView(),
        ]);
    }

    // Édition d'une offre
    #[Route('admin/edit/{slug}', name: 'app_offres_edit')]
    public function edit(
        OffresRepository $offresRepo,
        string $slug,
        Request $request,
        EntityManagerInterface $em,
        SluggerInterface $slugger
    ): Response {
        $offre = $offresRepo->findOneBy(['slug' => $slug]);
        if (!$offre) {
            throw $this->createNotFoundException("Offre non trouvée");
        }

        $title = "Modifier une offre";
        $form = $this->createForm(OffresFormType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $slug = $form->get('intitule')->getData();
            $offre->setSlug($slugger->slug($slug));

            $em->persist($offre);
            $em->flush();

            $this->addFlash('success', "L'offre a bien été modifiée.");
            return $this->redirectToRoute('app_offres_index');
        }

        if (!$this->isGranted('ROLE_ADMIN')) {
            $this->addFlash('danger', "Accès réservé aux administrateurs.");
            return $this->redirectToRoute('app_login');
        }

        return $this->render('admin/offres/edit.html.twig', [
            'offre' => $offre,
            'title' => $title,
            'form'  => $form->createView(),
        ]);
    }

    // Filtrer les offres par discipline sportive (slugs dans l’URL)
    #[Route('/offres/sports/{slugs?}', name: 'app_offres_filter')]
    public function filterBySportsSlugs(
        SportsRepository $sportRepo,
        OffresRepository $offreRepo,
        CategoriesOffresRepository $categorieRepo,
        PaginatorInterface $paginator,
        string $slugs = null,
        Request $request
    ): Response {
        $slugsArray = $slugs ? explode(',', $slugs) : [];

        $sports = $sportRepo->findSportsInOffres();

        // ✅ renvoie un QueryBuilder/Query pour le paginator
        $data = !empty($slugsArray)
            ? $offreRepo->findBySportSlugs($slugsArray)
            : $offreRepo->createQueryBuilder('o')
            ->orderBy('o.dateDebut', 'ASC')
            ->getQuery();

        $offres = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            12
        );

        $categoriesOffres = $categorieRepo->findAll();

        if ($request->isXmlHttpRequest()) {
            return $this->render('_partials/_catalogue-offres-ajax-wrapper.html.twig', [
                'offres' => $offres,
            ]);
        }

        return $this->render('offres/catalogue-offres-clients.html.twig', [
            'categoriesOffres' => $categoriesOffres,
            'sports'          => $sports,
            'selectedSlugs'   => $slugsArray,
            'offres'          => $offres,
        ]);
    }
}
