<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InformationsUtilesController extends AbstractController
{
    #[Route('/mentionslegales', name: 'app_mentions_legales')]
    public function mentionsLegales(): Response
    {
        return $this->render('informations_utiles/mentionslegales.html.twig');
    }
}
