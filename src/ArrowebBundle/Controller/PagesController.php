<?php

namespace ArrowebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;

use ArrowebBundle\Form\ContactType;


class PagesController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('ArrowebBundle:pages:index.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        
        $form = $this->get('form.factory')->create(ContactType::class);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            $data = $form->getData();

            $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('send@example.com')
            ->setTo('claire.bourdale@gmail.com')
            ->setBody($this->renderView('Emails/registration.html.twig', array('data' => $data)), 'text/html');

            $this->get('mailer')->send($message);

            $request->getSession()->getFlashBag()->add('success', 'Votre message a bien été envoyé.');

            return $this->redirectToRoute('contact');
        }
    
    
    
        
        return $this->render('ArrowebBundle:pages:contact.html.twig', array('form' => $form->createView(),
        ));
    }
}
