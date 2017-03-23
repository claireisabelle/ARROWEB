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

    /**
     * @Route("/prestations/maintenance-site-internet", name="prestation_maintenance")
     */
    public function maintenanceAction()
    {
        return $this->render('ArrowebBundle:prestations:maintenance-site-internet.html.twig');
    }

    /**
     * @Route("/prestations/integration-site-internet", name="prestation_integration")
     */
    public function integrationAction()
    {
        return $this->render('ArrowebBundle:prestations:integration-site-internet.html.twig');
    }

    /**
     * @Route("/prestations/site-internet-sport", name="prestation_sport")
     */
    public function sportAction()
    {
        return $this->render('ArrowebBundle:prestations:site-internet-sport.html.twig');
    }
}
