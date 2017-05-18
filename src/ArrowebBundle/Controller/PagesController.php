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
     * @Route("/questions-frequentes", name="questions")
     */
    public function questionsAction()
    {
        return $this->render('ArrowebBundle:pages:questions.html.twig');
    }

    /**
     * @Route("/a-propos", name="about")
     */
    public function aboutAction()
    {
        return $this->render('ArrowebBundle:pages:a-propos.html.twig');
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
            ->setSubject('Formulaire posté depuis Arroweb')
            ->setFrom('postmaster@arroweb.net')
            ->setTo('claire@arroweb.net')
            ->setBody($this->renderView('Emails/registration.html.twig', array('data' => $data)), 'text/html');

            $this->get('mailer')->send($message);

            $request->getSession()->getFlashBag()->add('success', 'Je vous remercie pour votre message. Je vous réponds très vite !');

            return $this->redirectToRoute('contact');
        }
    
    
    
        
        return $this->render('ArrowebBundle:pages:contact.html.twig', array('form' => $form->createView(),
        ));
    }

    /**
     * @Route("/mentions-legales", name="mentions")
     */
    public function mentionsAction()
    {
        return $this->render('ArrowebBundle:pages:mentions-legales.html.twig');
    }
}
