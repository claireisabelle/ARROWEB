<?php

namespace ArrowebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;

use ArrowebBundle\Entity\Reference;
use ArrowebBundle\Entity\Image;
use ArrowebBundle\Form\ReferenceType;
use ArrowebBundle\Form\ImageType;

class PortfolioController extends Controller
{
    /**
     * @Route("/portfolio", name="portfolio")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        // Récupération de toutes les références
        $listeReferences = $em->getRepository('ArrowebBundle:Reference')->getReferences();

        return $this->render('ArrowebBundle:portfolio:portfolio.html.twig', array('listeReferences' => $listeReferences));
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

    /**
     * @Route("/gestion/supprimer/{id}", name="supprimer-reference", requirements={"id": "\d+"})
     */
    public function supprimerAction(Request $request, $id)
    {
        
        $em = $this->getDoctrine()->getManager();

        $reference = $em->getRepository('ArrowebBundle:Reference')->find($id);

        if(!$reference)
        {
            throw $this->createNotFoundException('La référence n° '.$id.' est inconnue.');
        }

        $form = $this->createFormBuilder()->getForm();

        if($form->handleRequest($request)->isValid())
        {
            $em->remove($reference);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'La référence a bien été supprimée.');
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('ArrowebBundle:portfolio:supprimer.html.twig', array('reference' => $reference, 'form' => $form->createView()));

    }

    /**
     * @Route("/gestion/editer/{id}", name="editer-reference", requirements={"id": "\d+"})
     */
    public function editerAction(Request $request, $id)
    {
        
        $em = $this->getDoctrine()->getManager();

        $reference = $em->getRepository('ArrowebBundle:Reference')->find($id);

        if(!$reference)
        {
            throw $this->createNotFoundException('La référence n° '.$id.' est inconnue.');
        }

        $form = $this->createForm(ReferenceType::class, $reference);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'La référence a bien été mise à jour.');

            return $this->redirectToRoute('dashboard');
        }

        return $this->render('ArrowebBundle:portfolio:editer.html.twig', array('reference' => $reference,'form' => $form->createView()));

    }


}
