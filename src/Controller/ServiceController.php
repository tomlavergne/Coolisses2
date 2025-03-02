<?php

namespace App\Controller;

use App\Entity\ArticleLocation;
use App\Entity\Atelier;
use App\Entity\Formation;
use App\Entity\Profil;
use App\Entity\Realisation;
use App\Entity\Stage;
use App\Form\ProfilSearchType;
use App\Repository\ProfilRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

class ServiceController extends AbstractController
{
    #[Route('/services', name: 'app_services')]
    public function services(): Response
    {
        return $this->render('service/services.html.twig');
    }

    #[Route('/formations', name: 'app_formations')]
    public function formations(EntityManagerInterface $entityManager, Request $request): Response
    {
        $formations = $entityManager->getRepository(Formation::class)->findAll();
        return $this->render('service/formations.html.twig', [
            'formations' => $formations
        ]);
    }

    #[Route('/stages', name: 'app_stages')]
    public function stages(EntityManagerInterface $entityManager, Request $request): Response
    {
        $stages = $entityManager->getRepository(Stage::class)->findAll();
        return $this->render('service/stages.html.twig', [
            'stages' => $stages
        ]);
    }

    #[Route('/miseenrelation', name: 'app_miseenrelation')]
    public function miseenrelation(ProfilRepository $repository,
                                   Request $request,
                                   PaginatorInterface $paginator,
                                   SessionInterface $session
                        ): Response
    {
        $form = $this->createForm(ProfilSearchType::class);
        $filter = [];

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {             // Si soumission du formulaire
            $filter = $form->getData();
            $session->set('filter', $filter);
        } else {
            if ($session->has('filter')) {
                $filter = $session->get('filter');            }
        }
        $profils = $repository->findByCriteria($filter);
        shuffle($profils);
        return $this->render('service/miseenrelation.html.twig', [
            'profils' => $profils,
            'now' =>  new \DateTime(),
            'form' => $form->createView()
        ]);
    }


    #[Route('/ateliers', name: 'app_ateliers')]
    public function ateliers(EntityManagerInterface $entityManager, Request $request): Response
    {
        $ateliers = $entityManager->getRepository(Atelier::class)->findAll();
        return $this->render('service/ateliers.html.twig', [
            'ateliers' => $ateliers
        ]);
    }



    #[Route('/locations', name: 'app_locations')]
    public function locations(EntityManagerInterface $entityManager): Response
    {
        $articles = $entityManager->getRepository(ArticleLocation::class)->findAll();
        //dd($articles);
        return $this->render('service/locations.html.twig', [
             'articles' => $articles
         ]);
    }

    /*
    public function profilPassTroughTheFilter(Profil $profil, array $filter): bool{
        if($filter){
            if ($filter['metier']){
                if (!in_array($filter['metier'], $profil->getMetier()->toArray(), true)){
                    return false;
                }
            }
            if ($filter['genre']){
                if ($profil->getGenre()->getId()!=$filter['genre']->getId()){
                    return false;
                }
            }
            if ($filter['experience']){
                if ($profil->getExperience()!=$filter['experience']){
                    return false;
                }
            }
            if ($filter['langue']){
                if (!in_array($filter['langue'], $profil->getLangues()->toArray(), true)){
                    return false;
                }
            }
            $dateActuelleObj = new DateTime();
            $age = $dateActuelleObj->diff($profil->getDateNaissance())->y;

            if ($filter['agemin']){
                if ($age<$filter['agemin']){
                    return false;
                }
            }
            if ($filter['agemax']){
                if ($age>$filter['agemax']){
                    return false;
                }
            }

        return true;
    }
    */
}