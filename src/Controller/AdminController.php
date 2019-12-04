<?php


namespace App\Controller;


use App\Entity\Persoon;
use App\Entity\task;
use App\Entity\Training;
use App\Form\Type\TaskType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Twig\Extra\Intl\IntlExtension;


class AdminController extends AbstractController
{
    //route voor de homepagina van admins
    /**
     * @Route("/admin/home")
     */

    public function homepage() {
        return $this->render('admin/index.html.twig', [

        ]);
    }
//route voor admins voor een overzicht voor de acties van trainingen
    /**
     * @Route("/admin/trainingen")
     */

    public function trainingen() {
        return $this->render('admin/trainingen.html.twig', [

        ]);
    }

    //route voor admins voor een overzicht van alle trainingen
    /**
     * @Route("/admin/training_overzicht", name="training_overzicht")
     */

    public function training_overzicht() {
        $entityManager = $this->getDoctrine()->getManager();
        $trainingen = $entityManager->getRepository(Training::class)->findAll();


        return $this->render('admin/training_overzicht.html.twig',  ['trainingen' => $trainingen]

        );
    }






}