<?php

namespace Acme\GeneratorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeGeneratorBundle:Default:index.html.twig');
    }
}
