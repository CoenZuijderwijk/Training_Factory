<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ArticleController extends AbstractController
{
    /**
     * @Route("/")
     */

    public function homepage() {
        return $this->render('bezoekers/index.html.twig', [

        ]);
    }
    /**
     * @Route("/news/{slug}")
     */
    public function show($slug)
    {
        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
        ]);
    }

    /**
     * @Route("/leden/home")
     */
    public function ledenhomepage() {
        return $this->render('leden/index.html.twig', [

        ]);
    }

    /**
     * @Route("/bezoekers/trainings_aanbod")
     */
    public function trainings_aanbod() {
        return $this->render('bezoekers/trainings_aanbod.html.twig', [

        ]);
    }

}