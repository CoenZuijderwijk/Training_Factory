<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LedenController extends AbstractController
{


    /**
     * @Route("/leden/home")
     */
    public function ledenhomepage() {
        return $this->render('leden/index.html.twig', [

        ]);
    }


}