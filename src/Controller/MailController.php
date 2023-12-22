<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    #[Route('/email', name: 'email')]
    public function index(MailerInterface $mailer): Response
    {
        $email = (new Email())
        ->from('admin@books.com')
        ->to('you@example.com')
        ->subject('Test envoie email!')
        ->text('Sending emails is fun again!')
        ->html('<p>See Twig integration for better HTML integration!</p>');

        $mailer->send($email);
   
        $this->addFlash(
            'notice',
            'Email envoyé !'
        );

        return $this->redirectToRoute('home');
    }
}
