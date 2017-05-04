<?php

namespace ArrowebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;

use ArrowebBundle\Entity\Reference;
use ArrowebBundle\Form\ReferenceType;


class PortfolioController extends Controller
{
    /**
     * @Route("/portfolio", name="portfolio")
     */
    public function indexAction()
    {
        return $this->render('ArrowebBundle:portfolio:portfolio.html.twig');
    }

    /**
     * @Route("/gestion", name="dashboard")
     */
    public function dashboardAction()
    {
        $em = $this->getDoctrine()->getManager();

        // Récupération de toutes les références
        $listeReferences = $em->getRepository('ArrowebBundle:Reference')->getReferences();

        return $this->render('ArrowebBundle:portfolio:dashboard.html.twig', array('listeReferences' => $listeReferences));
    }

    /**
     * @Route("/gestion/ajouter", name="ajouter-reference")
     */
    public function ajouterAction(Request $request)
    {
        
        $reference = new Reference();
        // Appel du formulaire depuis le constructeur dans Form/ReferenceType.php
        $form = $this->get('form.factory')->create(ReferenceType::class, $reference);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reference);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'La référence a bien été ajoutée.');

            return $this->redirectToRoute('dashboard');
        }

        // Si le formulaire n'a pas été posté, on affiche la page du formulaire pour pouvoir le poster
        return $this->render('ArrowebBundle:portfolio:ajouter.html.twig', array('form' => $form->createView(),
        ));

    }




}
