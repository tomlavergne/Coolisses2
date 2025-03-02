<?php

namespace App\Controller;

use App\Entity\Profil;
use App\Form\ProfilSearchType;
use App\Repository\ProfilRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

final class ProfilController extends AbstractController
{
    #[Route('/profils', name: 'app_profils')]
    public function profils(ProfilRepository $repository, Request $request, SessionInterface $session): Response
    {
        $form = $this->createForm(ProfilSearchType::class);
        $filter = [];
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $filter = $form->getData();
            $session->set('filter', $filter);
        } else {
            if ($session->has('filter')) {
                $filter = $session->get('filter');
            }
        }
        $profils = $repository->findByCriteria($filter);
        shuffle($profils);
        return $this->render('profil/profils.html.twig', [
            'profils' => $profils,
            'now' =>  new \DateTime(),
            'form' => $form->createView()
        ]);
    }

    #[Route('/profils/{id}', name: 'app_profil')]
    public function profil(ProfilRepository $repository, $id): Response
    {
        $profil = $repository->find($id);
        return $this->render('profil/profil.html.twig', [
            'profil' => $profil,
        ]);
    }
}
