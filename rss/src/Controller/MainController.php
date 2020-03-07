<?php

namespace App\Controller;

use App\Service\Rss\RssFeed;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MainController
 *
 * @package App\Controller
 */
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
     * @param RssFeed $rssFeed
     *
     * @return Response
     */
    public function rssList(RssFeed $rssFeed): Response
    {
        $feed = $rssFeed->getFeed();

        return $this->render('main/rss.html.twig',
            [
                'feedEntries' => $feed->getEntries(),
            ]
        );
    }
}
