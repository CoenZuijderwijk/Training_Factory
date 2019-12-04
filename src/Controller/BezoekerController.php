<?php


namespace App\Controller;


use App\Entity\Persoon;
use App\Entity\task;
use App\Form\Type\TaskType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BezoekerController extends AbstractController
{
    //route voor de standaard homepagina
    /**
     * @Route("/")
     */

    public function homepage() {
        return $this->render('bezoekers/index.html.twig', [

        ]);
    }

    //route voor het trainings aanbod
    /**
     * @Route("/bezoekers/trainings_aanbod")
     */
    public function trainings_aanbod() {
        return $this->render('bezoekers/trainings_aanbod.html.twig', [

        ]);
    }

    //route om contact op te nemen
    /**
     * @Route("/bezoekers/contact", name="einde")
     */
    public function locatie_contact() {
        return $this->render('bezoekers/locatie_contact.html.twig', [

        ]);
    }

    //route om de gedrags regels te zien
    /**
     * @Route("/bezoekers/gedrags_regels")
     */
    public function gedrags_regels() {
        return $this->render('bezoekers/gedrags_regels.html.twig', [

        ]);
    }


}