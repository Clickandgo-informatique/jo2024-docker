<?php
// OffresController.php

namespace App\Controller\Admin;

use App\Entity\Offres;
use App\Form\OffresFormType;
use App\Repository\CategoriesOffresRepository;
use App\Repository\OffresRepository;
use App\Repository\SportsRepository;
use App\Service\PictureService;
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
    #[Route('admin/offres', name: 'app_offres_index')]
    public function index(
        OffresRepository $offresRepo,
        Request $request,
        PaginatorInterface $paginator
    ): Response {
        $data = $offresRepo->findBy([], ['intitule' => 'ASC']);
        $offres = $paginator->paginate($data, $request->query->getInt('page', 1), 12);

        return $this->render('admin/offres/index.html.twig', [
            'offres' => $offres,
        ]);
    }

    #[Route('/catalogue-offres-clients', name: 'app_offres_catalogue')]
    public function catalogue(
        OffresRepository $offresRepo,
        Request $request,
        PaginatorInterface $paginator,
        CategoriesOffresRepository $categoriesOffresRepo,
        SportsRepository $sportsRepo
    ): Response {

        // Récupération de toutes les catégories et sports pour les filtres
        $categoriesOffres = $categoriesOffresRepo->findBy([], ['nom' => 'ASC']);
        $sports = $sportsRepo->findBy([], ['intitule' => 'ASC']);

        // Récupération des filtres depuis query string
        $selectedSports = $request->query->get('sports', '');
        $selectedCategories = $request->query->get('categories', '');
        $selectedSports = $selectedSports ? explode(',', $selectedSports) : [];
        $selectedCategories = $selectedCategories ? explode(',', $selectedCategories) : [];

        // Construction de la requête filtrée
        $qb = $offresRepo->createQueryBuilder('o')
            ->andWhere('o.isPublished = true');

        // Filtre ManyToMany sports
        if ($selectedSports) {
            $qb->join('o.sports', 's')
                ->andWhere('s.slug IN (:sports)')
                ->setParameter('sports', $selectedSports);
        }

        // Filtre ManyToOne catégories
        if ($selectedCategories) {
            $qb->join('o.categorie', 'c')
                ->andWhere('c.slug IN (:categories)')
                ->setParameter('categories', $selectedCategories);
        }

        $query = $qb->orderBy('o.dateDebut', 'ASC')->getQuery();

        // Pagination
        $offres = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            12
        );

        // Si requête AJAX : renvoyer uniquement le partial
        if ($request->isXmlHttpRequest()) {
            return $this->render('_partials/_catalogue-offres-ajax-wrapper.html.twig', [
                'offres' => $offres,
            ]);
        }

        // Sinon : page complète
        return $this->render('offres/catalogue-offres-clients.html.twig', [
            'offres' => $offres,
            'categoriesOffres' => $categoriesOffres,
            'sports' => $sports,
            'selectedSports' => $selectedSports,
            'selectedCategories' => $selectedCategories,
        ]);
    }


    #[Route('/offres-par-categorie/{slug}', name: 'offres-par-categories')]
    public function filterByCategorie(
        Request $request,
        OffresRepository $offresRepo,
        CategoriesOffresRepository $categoriesOffresRepo,
        string $slug,
        PaginatorInterface $paginator,
        SportsRepository $sportsRepo
    ): JsonResponse|Response {
        $data = $offresRepo->getOffresParCategories($slug);
        $offres = $paginator->paginate($data, $request->query->getInt('page', 1), 12);
        $categoriesOffres = $categoriesOffresRepo->findBy([], ['nom' => 'ASC']);

        if ($request->isXmlHttpRequest()) {
            $html = $this->renderView('_partials/_catalogue-offres-ajax-wrapper.html.twig', [
                'offres' => $offres,
            ]);

            return new JsonResponse(['status' => 'success', 'html' => $html]);
        }

        return $this->render('offres/catalogue-offres-clients.html.twig', [
            'offres'           => $offres,
            'categorie'        => $slug,
            'categoriesOffres' => $categoriesOffres,
            'selectedSlugs'    => [],
            'sports'           => $sportsRepo->findBy([], ['intitule' => 'ASC']),
        ]);
    }

    #[Route('admin/offres/ajout', name: 'app_offres_new')]
    public function new(
        Request $request,
        EntityManagerInterface $em,
        SluggerInterface $slugger,
        PictureService $pictureService
    ): Response {
        $offre = new Offres();
        $form = $this->createForm(OffresFormType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('imageFile')->getData();
            if ($imageFile) {
                $filename = $pictureService->upload($imageFile, '/offres');
                $offre->setImage($filename);
            }

            $offre->setSlug($slugger->slug($form->get('intitule')->getData()));
            $em->persist($offre);
            $em->flush();

            $this->addFlash('success', "L'offre a bien été enregistrée.");
            return $this->redirectToRoute('app_offres_index');
        }

        return $this->render('admin/offres/edit.html.twig', [
            'offre' => $offre,
            'title' => "Créer une offre",
            'form'  => $form->createView(),
        ]);
    }

    #[Route('admin/edit/{slug}', name: 'app_offres_edit')]
    public function edit(
        OffresRepository $offresRepo,
        string $slug,
        Request $request,
        EntityManagerInterface $em,
        SluggerInterface $slugger,
        PictureService $pictureService
    ): Response {
        $offre = $offresRepo->findOneBy(['slug' => $slug]);
        if (!$offre) {
            throw $this->createNotFoundException("Offre non trouvée");
        }

        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $form = $this->createForm(OffresFormType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('imageFile')->getData();
            if ($imageFile) {
                if ($offre->getImage()) {
                    $pictureService->delete($offre->getImage(), '/offres');
                }
                $filename = $pictureService->upload($imageFile, '/offres');
                $offre->setImage($filename);
            }

            $offre->setSlug($slugger->slug($form->get('intitule')->getData()));
            $em->persist($offre);
            $em->flush();

            $this->addFlash('success', "L'offre a bien été modifiée.");
            return $this->redirectToRoute('app_offres_index');
        }

        return $this->render('admin/offres/edit.html.twig', [
            'offre' => $offre,
            'title' => "Modifier une offre",
            'form'  => $form->createView(),
        ]);
    }

    #[Route('admin/offres/{id}/delete-image', name: 'app_offres_delete_image')]
    public function deleteImage(
        Offres $offre,
        PictureService $pictureService,
        EntityManagerInterface $em
    ): Response {
        if ($offre->getImage()) {
            $pictureService->delete($offre->getImage(), '/offres');
            $offre->setImage(null);
            $em->flush();
        }

        return $this->redirectToRoute('app_offres_edit', ['slug' => $offre->getSlug()]);
    }

    #[Route('/offres/offres/{slugs?}', name: 'app_offres_filter')]
    public function filterBySportsSlugs(
        SportsRepository $sportsRepo,
        OffresRepository $offresRepo,
        CategoriesOffresRepository $categoriesRepo,
        PaginatorInterface $paginator,
        string $slugs = null,
        Request $request
    ): Response {
        $slugsArray = $slugs ? explode(',', $slugs) : [];
        $data = !empty($slugsArray)
            ? $offresRepo->findBySportSlugs($slugsArray)
            : $offresRepo->createQueryBuilder('o')->orderBy('o.dateDebut', 'ASC')->getQuery();

        $offres = $paginator->paginate($data, $request->query->getInt('page', 1), 12);
        $categoriesOffres = $categoriesRepo->findAll();

        if ($request->isXmlHttpRequest()) {
            return $this->render('_partials/_catalogue-offres-ajax-wrapper.html.twig', [
                'offres' => $offres,
            ]);
        }

        return $this->render('offres/catalogue-offres-clients.html.twig', [
            'categoriesOffres' => $categoriesOffres,
            'offres'           => $offres,
            'selectedSlugs'    => $slugsArray,
        ]);
    }
}
