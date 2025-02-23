<?php

namespace App\Controller;

use App\Entity\Realisation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CoolissesEducationController extends AbstractController
{
    #[Route('/coolisses/education', name: 'app_coolisses_education')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $realisations = $entityManager->getRepository(Realisation::class)->findAll();
        return $this->render('coolisses_education/index.html.twig', [
            'realisations' => $realisations
        ]);
    }
}
