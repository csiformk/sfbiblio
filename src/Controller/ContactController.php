<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request,MailerInterface $mailer): Response
    {
        $formContact = $this->createForm(ContactType::class);
        $formContact->handleRequest($request);

        if($formContact->isSubmitted() && $formContact->isValid()):
            $ContactData= $formContact->getData();
            
            $email = (new Email())
            ->to($ContactData['email'])
            ->subject($ContactData['sujet'])
            ->text($ContactData['message'])
            ->html('<p>'. $ContactData['message'] . '</p>');
    
            $mailer->send($email);

            $this->addFlash(
                'notice',
                'Email sent!'
            );

            return $this->redirectToRoute('home');
            // return $this->render('contact/index.html.twig', [
            //     'isSend' => true,
            // ]);

        endif;
        
        return $this->render('contact/index.html.twig', [
            'formContact' => $formContact,
        ]);
    }
}
