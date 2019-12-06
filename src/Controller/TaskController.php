<?php


namespace App\Controller;

use App\Entity\Persoon;
use App\Entity\Training;
use App\Form\Type\PersoonType;
use App\Form\Type\TrainingType;
use App\Form\Type\TaskType;
use App\Entity\task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    //route voor inschrijven in een andere controller voor de form
    /**
     * @Route("/bezoekers/inschrijven")
     */

    public function Inschrijven(Request $request)
    {
        $person = new Persoon();

        $form = $this->createForm(PersoonType::class, $person);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $persoon=$form->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($persoon);
            $em->flush();
            $this->addFlash('succes', 'persoon toegevoegd');

        }

        return $this->render('/bezoekers/Inschrijven.html.twig', [
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

    //route voor admins om een training te wijzigen
    /**
     * @Route("/admin/training_wijzigen/{id}", name="training_wijzigen")
     */

    public function training_wijzigen(Request $request, $id) {
        $entityManager = $this->getDoctrine()->getManager();
        $trainingen = $entityManager->getRepository(Training::class)->findAll();


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



        return $this->render('admin/training_wijzigen.html.twig',  ['trainingen' => $trainingen]

        );
    }

    //route voor admins om een training te wijzigen
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



}