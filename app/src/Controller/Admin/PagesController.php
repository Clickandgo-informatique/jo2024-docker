<?php

namespace App\Controller\Admin;

use App\Entity\Pages;
use App\Form\PagesType;
use App\Repository\PagesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route(path: '/admin/pages', name: 'app_pages_')]
final class PagesController extends AbstractController
{
    #[Route(path: '/', name: 'index')]
    public function index(PagesRepository $pagesRepo, PaginatorInterface $paginator, Request $request): Response
    {

        $data = $pagesRepo->findBy([], ['createdAt' => 'DESC']);

        //Pagination 
        $pages = $paginator->paginate($data, $request->query->getInt('page', 1), 12);

        return $this->render('_partials/_pages.html.twig', ['pages' => $pages]);
    }

    //Créer une nouvelle page
    #[Route(path: '/ajouter', name: 'ajout')]
    public function add(EntityManagerInterface $em, Request $request, SluggerInterface $slugger): Response
    {
        $page = new Pages();
        $titre = 'Créer une page';
        $form = $this->createForm(PagesType::class, $page);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $page->setSlug(strtolower($slugger->slug($form->get('titre')->getData())->lower()));
            $em->persist($page);
            $em->flush();

            $this->addFlash('success', 'La page a été enregistrée dans la base avec succès.');
            return $this->redirectToRoute('app_pages_index');
        }

        return $this->render('pages/pages-form.html.twig', [
            'form' => $form,
            'titre' => $titre
        ]);
    }

    #[Route(path: '/{slug}/modifier', name: 'modifier')]
    public function edit(EntityManagerInterface $em, Request $request, PagesRepository $pagesRepo, string $slug, SluggerInterface $slugger): Response
    {
        $page = $pagesRepo->findOneBy(['slug' => $slug]);
        $titre = 'Modifier une page';
        $form = $this->createForm(PagesType::class, $page);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $page->setUpdatedAt = new \DateTimeImmutable();

            //On actualise le slug si besoin
            $page->setSlug(strtolower($slugger->slug($form->get('titre')->getData())->lower()));

            $em->persist($page);
            $em->flush();

            $this->addFlash('success', 'La page a été enregistrée dans la base avec succès.');
            return $this->redirectToRoute('app_pages_index');
        }

        return $this->render('pages/pages-form.html.twig', [
            'form' => $form,
            'titre' => $titre
        ]);
    }
}
