<?php

namespace App\Controller\Admin;

use App\Entity\Sports;
use App\Form\SportsFormType;
use App\Repository\SportsRepository;
use App\Service\PictureService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

final class SportsController extends AbstractController
{
    //liste de toutes les sports
    #[Route('/admin/sports', name: 'app_sports_index')]
    public function index(SportsRepository $sportsRepo): Response
    {
        $sports = $sportsRepo->findBy([], ['intitule' => 'ASC']);
        return $this->render('admin/sports/index.html.twig', ['sports' => $sports]);
    }

    //Ajout d'une nouvelle discipline sportive
    #[Route('/admin/sports/ajout', name: 'app_sports_new')]
    public function new(EntityManagerInterface $em, Request $request, SluggerInterface $slugger): Response
    {
        $sport = new Sports();
        $title = "Ajouter une discipline sportive";

        $form = $this->createForm(SportsFormType::class, $sport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //On sluggifie sur le champ de formulaire "intitule"
            $slug = $form->get('intitule')->getData();
            $sport->setSlug($slugger->slug($slug));

            $em->persist($sport);
            $em->flush();

            $this->addFlash('success', 'La discipline a bien été enregistrée dans la base.');
            return $this->redirectToRoute('app_sports_index');
        }

        return $this->render('admin/sports/sports-form.html.twig', ['form' => $form->createView(), 'title' => $title]);
    }

    //Modifier une discipline
    #[Route('/admin/sports/edit/{slug}', name: 'app_sports_edit')]
    public function edit(SportsRepository $sportsRepo, EntityManagerInterface $em, Request $request, string $slug, SluggerInterface $slugger): Response
    {
        $sport = $sportsRepo->findOneBy(['slug' => $slug]);
        $title = "Modifier une discipline";

        $form = $this->createForm(SportsFormType::class, $sport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //On sluggifie sur le champ de formulaire "intitule"
            $slug = $form->get('intitule')->getData();
            $sport->setSlug($slugger->slug($slug));

            $em->persist($sport);
            $em->flush();

            return $this->redirectToRoute('app_sports_index');
        }

        $this->addFlash('succcess', 'Les modification concernant la discipline ont bien été enregistrées dans la base.');
        return $this->render('admin/sports/sports-form.html.twig', ['discipline' => $sport, 'form' => $form->createView(), 'title' => $title]);
    }
    #[Route('/sports/{id}', name: 'app_sports_delete', methods: ['POST'])]
    public function delete(Request $request, Sports $sport, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete' . $sport->getId(), $request->request->get('_token'))) {
            try {
                $em->remove($sport);
                $em->flush();
                $this->addFlash('success', 'Le sport a bien été supprimé de la base de données.');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de la suppression : ' . $e->getMessage());
            }
        } else {
            $this->addFlash('error', 'Le token CSRF est invalide, suppression annulée.');
        }

        return $this->redirectToRoute('app_sports_index');
    }
}
