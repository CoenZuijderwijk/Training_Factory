<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BezoekerController extends AbstractController
{
    /**
     * @Route("/")
     */

    public function homepage() {
        return $this->render('bezoekers/index.html.twig', [

        ]);
    }

    /**
     * @Route("/bezoekers/trainings_aanbod")
     */
    public function trainings_aanbod() {
        return $this->render('bezoekers/trainings_aanbod.html.twig', [

        ]);
    }

    /**
     * @Route("/bezoekers/contact")
     */
    public function locatie_contact() {
        return $this->render('bezoekers/locatie_contact.html.twig', [

        ]);
    }

}