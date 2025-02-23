<?php

namespace App\Controller;

use App\Entity\CategorieFilm;
use App\Entity\Realisation;
use App\Form\CategorieFilmChoiceType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RealisationController extends AbstractController
{
    #[Route('/realisation/{id}', name: 'app_realisation')]
    public function realisationById(EntityManagerInterface $entityManager, $id): Response
    {
        $realisation = $entityManager->getRepository(Realisation::class)->find($id);
        return $this->render('realisation/realisation.html.twig', [
            'realisation' => $realisation,
        ]);
    }

    #[Route('/realisations', name: 'app_realisations')]
    public function realisations(EntityManagerInterface $entityManager,
                                 Request $request,
                                 PaginatorInterface $paginator): Response
    {
        $form = $this->createForm(CategorieFilmChoiceType::class);
        $titre = 'Toutes les réalisations';

        $realisations = $entityManager->getRepository(Realisation::class)->findAll();

        $pagination = $paginator->paginate(
            $realisations,
            $request->query->getInt('page', 1),
            10
        );

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if(!$form->getData()['nom']==null) {
                $categorieid = $form->getData()['nom']->getId();
                return $this->redirectToRoute('app_realisations_categorie',  ['categorieId' => $categorieid]);
            }
        }

        return $this->render('realisation/realisations.html.twig', [
            'titre' => $titre,
            'realisations' => $pagination,
            'form' => $form
        ]);
    }

    #[Route('/realisations/{categorieId}', name: 'app_realisations_categorie')]
    public function realisationsByCategorie(EntityManagerInterface $entityManager,
                                            $categorieId,
                                            Request $request,
                                            PaginatorInterface $paginator): Response
    {
        $realisations = $this->filterRealisationByCategorieName($entityManager, $categorieId);
        $categorie = $entityManager->getRepository(CategorieFilm::class)->find($categorieId);
        $titre = $categorie->getNom();
        $form = $this->createForm(CategorieFilmChoiceType::class);

        $pagination = $paginator->paginate(
            $realisations,
            $request->query->getInt('page', 1),
            10
        );

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if(!$form->getData()['nom']==null) {
                $categorieId = $form->getData()['nom']->getId();
                return $this->redirectToRoute('app_realisations_categorie',  ['categorieId' => $categorieId]);
            } else {
                return $this->redirectToRoute('app_realisations');
            }
        }

        return $this->render('realisation/realisations.html.twig', [
            'titre' => $titre,
            'realisations' => $pagination,
            'form' => $form
        ]);
    }


    public function filterRealisationByCategorieName(EntityManagerInterface $entityManager, int $categorieId){
        $realisations = $entityManager->getRepository(Realisation::class)->findAll();
        $categorie = $entityManager->getRepository(CategorieFilm::class)->find($categorieId);
        $filteredRealisations = array();
        foreach ($realisations as $realisation) {
            if (in_array($categorie, $realisation->getCategorie()->toArray())) {
                $filteredRealisations[] = $realisation;
            }
        }
        return $filteredRealisations;
    }
}
