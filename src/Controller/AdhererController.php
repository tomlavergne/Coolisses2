<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ProfilAdherentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdhererController extends AbstractController
{
    #[Route('/adherer', name: 'app_adherer')]
    public function index(): Response
    {
        return $this->render('adherer/index.html.twig');
    }
}
