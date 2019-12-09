<?php


namespace App\Controller;


use App\Entity\task;
use App\Entity\Training;
use App\Form\Type\TaskType;
use App\Form\Type\TrainingType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
  * Require ROLE_ADMIN for *every* controller method in this class.
  *
  * @IsGranted("ROLE_ADMIN")
  */


class AdminController extends AbstractController
{
    /**
          * Require ROLE_ADMIN for only this controller method.
          *
          * @IsGranted("ROLE_ADMIN")
          */

    public function adminDashboard()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        // or add an optional message - seen by developers
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
    }
    //route voor de homepagina van admins
    /**
     * @Route("/admin/home", name="admin_home")
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

    //route voor admins om een training te verwijderen
    /**
     * @Route("/admin/training_verwijderen/{id}", name="training_verwijderen")
     */

    public function training_verwijderen($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $training_d = $entityManager->getRepository(Training::class)->find($id);
        $entityManager->remove($training_d);
        $entityManager->flush();
        return $this->render('admin/training_verwijderen.html.twig'
        );
    }

    //route voor admins om een training te wijzigen
    /**
     * @Route("/admin/training_wijzigen/{id}", name="training_wijzigen")
     */

    public function training_wijzigen(Request $request, $id) {
        $entityManager = $this->getDoctrine()->getManager();
        $training = $entityManager->getRepository(Training::class)->find($id);
        $form = $this->createForm(TrainingType::class, $training);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $training=$form->getData();
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($training);
            $entityManager->flush();
            $this->addFlash('succes', 'training aangepast');
        }
        return $this->render('/admin/training_toevoegen.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    //route voor training toevoegen  in een andere controller voor de form
    /**
     * @Route("/admin/add_training")
     */

    public function add_training(Request $request)
    {
        $training = new Training();

        $form = $this->createForm(TrainingType::class, $training);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $training=$form->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($training);
            $em->flush();
            $this->addFlash('succes', 'training toegevoegd');
        }
        return $this->render('/admin/training_toevoegen.html.twig', [
            'form' => $form->createView(),
        ]);
    }






}