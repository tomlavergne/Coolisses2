<?php

namespace App\Controller;

use App\Entity\Actualite;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ActualiteController extends AbstractController
{
    #[Route('/actualites', name: 'app_actualites')]
    public function actualites(EntityManagerInterface $entityManager,
                               Request $request,
                               PaginatorInterface $paginator): Response
    {
        $actualites = $entityManager->getRepository(Actualite::class)->findBy([], ['date' => 'DESC']);

        $pagination = $paginator->paginate(
            $actualites,
            $request->query->getInt('page', 1),
            9
        );
        return $this->render('actualite/actualites.html.twig', [
            'actualites' => $pagination
        ]);
    }

    #[Route('/actualite/{id}', name: 'app_actualite')]
    public function actualite(EntityManagerInterface $entityManager, $id): Response
    {
        $actualite = $entityManager->getRepository(Actualite::class)->find($id);
        return $this->render('actualite/actualite.html.twig', [
            'actualite' => $actualite,
        ]);
    }
}
