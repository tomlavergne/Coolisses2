<?php

namespace App\Controller;

use App\Entity\BruitDeCoolisses;
use App\Entity\CategorieFilm;
use App\Entity\Realisation;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArchiveController extends AbstractController
{
    #[Route('/archive', name: 'app_archive')]
    public function index(EntityManagerInterface $entityManager,
                          Request $request,): Response
    {
        $bruits = $entityManager->getRepository(BruitDeCoolisses::class)->findAllOrderedByDate();
        $realisations = $this->filterRealisationByCategorieName($entityManager, 5);
        return $this->render('archive/index.html.twig', [
            'bruitDeCoolisses' => array_slice($bruits, 0, 5),
            'realisations' => $realisations
        ]);
    }

    #[Route('/bruitsdecoolisses', name: 'app_bruitsdecoolisses')]
    public function bruitsdecoolisses(EntityManagerInterface $entityManager,
                                     Request $request,
                                     PaginatorInterface $paginator): Response
    {
        $bruitsDeCoolisses = $entityManager->getRepository(BruitDeCoolisses::class)->findAllOrderedByDate();

        $pagination = $paginator->paginate($bruitsDeCoolisses, $request->query->getInt('page', 1), 20);

        return $this->render('archive/bruitsdecoolisses.html.twig', [
            'bruitsDeCoolisses' => $pagination
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
