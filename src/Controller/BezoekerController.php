<?php


namespace App\Controller;


use App\Entity\Persoon;
use App\Entity\task;
use App\Entity\Training;
use App\Form\Type\LoginType;
use App\Form\Type\TaskType;
use App\Form\Type\TrainingType;
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

    /**
     * @Route("/logout", name="app_logout", methods={"GET"})
     */
    public function logout()
    {
        // controller can be blank: it will never be executed!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
        return $this->render('bezoekers/index.html.twig', [

        ]);
    }

    //route om in te loggen
    /**
     * @Route("/bezoekers/inloggen")
     */
    public function inloggen(Request $request) {
        $login = new Persoon();

        $form = $this->createForm(LoginType::class, $login);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $login=$form->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($login);
            $em->flush();
            $this->addFlash('succes', 'training toegevoegd');


        }

        return $this->render('/admin/training_toevoegen.html.twig', [
            'form' => $form->createView(),
        ]);
        return $this->render('bezoekers/inloggen.html.twig', [

        ]);
    }




}