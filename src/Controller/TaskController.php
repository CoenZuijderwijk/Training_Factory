<?php


namespace App\Controller;

use App\Form\Type\TaskType;
use App\Entity\task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{


    /**
     * @Route("/bezoekers/t_a")
     */
    public function trainings_aanbod() {
        return $this->render('bezoekers/trainings_aanbod.html.twig', [

        ]);
    }

    /**
     * @Route("/forms/test")
     */

    public function test(Request $request)
    {
        // just setup a fresh $task object (remove the example data)
        $task = new task();

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            return $this->redirectToRoute('/forms/test');
        }

        return $this->render('task/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }



}