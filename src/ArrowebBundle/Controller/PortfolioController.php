<?php

namespace ArrowebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class PortfolioController extends Controller
{
    /**
     * @Route("/portfolio", name="portfolio")
     */
    public function indexAction()
    {
        return $this->render('ArrowebBundle:portfolio:portfolio.html.twig');
    }


}
