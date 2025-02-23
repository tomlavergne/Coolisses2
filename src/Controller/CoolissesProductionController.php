<?php

namespace App\Controller;

use App\Entity\AffichageGeneral;
use App\Entity\Profil;
use App\Entity\Realisation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CoolissesProductionController extends AbstractController
{
    #[Route('/coolisses/production', name: 'app_coolisses_production')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $realisations = $entityManager->getRepository(Realisation::class)->findThreeLast();
        $profils = $entityManager->getRepository(AffichageGeneral::class)->findOneBy([])->getArtistesEnVitrine()->toArray();
        shuffle($profils);
        $profils1 = [];
        $profils2 = [];

        foreach ($profils as $index => $profil) {
            if ($index % 2 == 0) {
                $profils1[] = $profil;
            } else {
                $profils2[] = $profil;
            }
        }

        return $this->render('coolisses_production/index.html.twig', [
            'realisations' => $realisations,
            'profils1' => $profils1,
            'profils2' => $profils2
        ]);
    }
}
