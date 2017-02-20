<?php

namespace ArrowebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class PrestationsController extends Controller
{
    /**
     * @Route("/prestations/site-internet-sur-mesure", name="prestation_site_mesure")
     */
    public function indexAction()
    {
        return $this->render('ArrowebBundle:prestations:site-sur-mesure.html.twig');
    }

    /**
     * @Route("/prestations/site-internet-wordpress", name="prestation_site_wordpress")
     */
    public function worpdressAction()
    {
        return $this->render('ArrowebBundle:prestations:site-wordpress.html.twig');
    }

    /**
     * @Route("/prestations/refonte-site-internet", name="prestation_refonte_site")
     */
    public function refonteAction()
    {
        return $this->render('ArrowebBundle:prestations:refonte-site-internet.html.twig');
    }

}
