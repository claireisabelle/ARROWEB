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

}
