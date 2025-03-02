<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Entity\AffichageGeneral;
use App\Entity\Alerte;
use App\Entity\Contact;
use App\Entity\Partenaire;
use App\Entity\QuestionFAQ;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(EntityManagerInterface $entityManager, Request $request, MailerInterface $mailer): Response
    {
        $sended = false;
        $actualites = $entityManager->getRepository(Actualite::class)->findFourLast();
        $alert = $entityManager->getRepository(Alerte::class)->findOneBy([]);
        if(!$alert) {
            $alert = null;
        }

        $affichage = $entityManager->getRepository(AffichageGeneral::class)->findOneBy([]);
        if($affichage){
            $actualiteDialogBox = $affichage->getActualiteDialogBox();
        } else {
            $actualiteDialogBox = NULL;
        }

        $partenaires = $entityManager->getRepository(Partenaire::class)->findAll();

        $questions = $entityManager->getRepository(QuestionFAQ::class)->findAll();

        $form = $this->createForm(ContactType::class);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contactInfo = $form->getData();
            $contact = new Contact($contactInfo['nom'], $contactInfo['email'], $contactInfo['objet'], $contactInfo['message']);

            $entityManager->persist($contact);
            $entityManager->flush();

            $email = (new Email())
                ->from($contact->getEmail())
                ->to('morphee.prod@gmail.com')
                ->subject('Notification de prise de contact')
                ->text($contact->getEmail())
                ->html('<p>See Twig integration for better HTML integration!</p>');

            $mailer->send($email);
            return $this->render('contact/sended.html.twig');

        }

        return $this->render('accueil/index.html.twig', [
            'actualites' => $actualites,
            'partenaires' => $partenaires,
            'questions' => $questions,
            'form' => $form,
            'alert' => $alert,
            'actualiteDialogBox' => $actualiteDialogBox,
            'sended' => $sended
        ]);
    }
}