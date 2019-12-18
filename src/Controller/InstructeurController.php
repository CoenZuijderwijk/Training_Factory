<?php


namespace App\Controller;


use App\Entity\Lesson;
use App\Entity\Persoon;
use App\Entity\Registration;
use App\Entity\task;
use App\Form\Type\LessonType;
use App\Form\Type\TaskType;
use App\Repository\RegistrationRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Require ROLE_INSTRUCTEIR for *every* controller method in this class.
 *
 * @IsGranted("ROLE_INSTRUCTEUR")
 */



class InstructeurController extends AbstractController
{
    //route voor de instructeur homepagina
    /**
     * @Route("/instructeur/index")
     */

    public function index() {
        return $this->render('instructeur/index.html.twig', [
        ]);
    }

    //route voor instructeurs om alle lessen te zien
    /**
     * @Route("/instructeur/les_overzicht", name="les_overzicht")
     */

    public function les_overzicht() {
        $entityManager = $this->getDoctrine()->getManager();
        $les = $entityManager->getRepository(Lesson::class)->findAll();
        return $this->render('instructeur/les_overzicht.html.twig',  ['les' => $les]
        );
    }

    //route voor instructeurs om een les te verwijderen
    /**
     * @Route("/instructeur/les_verwijderen/{id}", name="les_verwijderen")
     */

    public function les_verwijderen($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $les_d = $entityManager->getRepository(Lesson::class)->find($id);
        $entityManager->remove($les_d);
        $entityManager->flush();
        return $this->render('les_overzicht'
        );
    }

    //route voor instructeurs om een les toe te voegen
    /**
     * @Route("/instructeur/les_toevoegen", name="les_toevoegen")
     */

    public function les_toevoegen(Request $request) {
        $les = new Lesson();

        $form = $this->createForm(LessonType::class, $les);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $les=$form->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($les);
            $em->flush();
            $this->addFlash('succes', 'les toegevoegd');
           return $this->les_overzicht();

        }
        return $this->render('instructeur/les_toevoegen.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    //route voor instructeurs om een les te wijzigen
    /**
     * @Route("/instructeur/les_wijzigen/{id}", name="les_wijzigen")
     */

    public function les_wijzigen(Request $request, $id) {
        $entityManager = $this->getDoctrine()->getManager();
        $les = $entityManager->getRepository(Lesson::class)->find($id);

        $form = $this->createForm(LessonType::class, $les);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $les=$form->getData();
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($les);
            $entityManager->flush();
            $this->addFlash('succes', 'les aangepast');
            return $this->render('les_overzicht');
        }
        return $this->render('instructeur/les_wijzigen.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    //route voor instructeurs om alle deelnemers per les  te zien
    /**
     * @Route("/instructeur/deelnemer_overzicht/{id}", name="deelnemer_overzicht")
     */

    public function deelnemer_overzicht(RegistrationRepository $repository,$id) {
    $members = $repository->getRegistrations($id);

        return $this->render('instructeur/deelnemer_lijst.html.twig',  ['members' => $members]
        );
    }









}