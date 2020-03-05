<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_index")
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->redirectToRoute('security_login');
    }

    /**
     * @Route("/rss", name="main_rss_list")
     *
     * @return Response
     */
    public function rssList(): Response
    {
        return $this->render('main/rss.html.twig');
    }
}
