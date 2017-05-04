<?php

namespace ArrowebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;

use ArrowebBundle\Entity\Reference;


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
        $reference->setTitre('Le Trail de lAngoisse');
        $reference->setDescription('Le site Internet officile de Hélène');
        $reference->setStatut('En ligne');
        $reference->setUrl('www.traildelangoisse.com');
        $reference->setAnnee('2016');

        // Récupération de l'Entity Manager
        $em = $this->getDoctrine()->getManager();

        // Persistement de la Référence
        $em->persist($reference);
        $em->flush();


        $request->getSession()->getFlashBag()->add('success', 'La référence a bien été ajoutée.');

        return $this->redirectToRoute('dashboard');
    }




}
