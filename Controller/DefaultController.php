<?php

namespace Tvornica\ImporBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    /**
     * @Route("/tvornica_impor")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from tvornica_impor');
    }
}
