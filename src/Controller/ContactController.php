<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\QuestionFAQ;
use App\Form\ContactType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/contact', name: 'app_contact')]
    public function contact(EntityManagerInterface $entityManager, Request $request, MailerInterface $mailer): Response
    {
        $sended = false;
        $form = $this->createForm(ContactType::class);

        $questions = $entityManager->getRepository(QuestionFAQ::class)->findAll();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contactInfo = $form->getData();
            $contact = new Contact($contactInfo['nom'], $contactInfo['email'], $contactInfo['objet'], $contactInfo['message']);

            $email = (new Email())
                ->from('hello@example.com')
                ->to('you@example.com')
                ->subject('Time for Symfony Mailer!')
                ->text('Sending emails is fun again!')
                ->html('<p>See Twig integration for better HTML integration!</p>');
            /*
                ->from($contact->getEmail())
                ->to('admin@admin.com')
                ->subject('Notification de prise de contact')
                ->text($contact->getEmail());
            */

            $mailer->   send($email);

            $entityManager->persist($contact);
            $entityManager->flush();
            return $this->render('contact/sended.html.twig');
        }

        return $this->render('contact/contact.html.twig', [
            'form' => $form,
            'questions' => $questions,
            'sended' => $sended
        ]);
    }
}
