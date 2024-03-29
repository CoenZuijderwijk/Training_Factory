<?php


namespace App\Controller;


use App\Entity\Lesson;
use App\Entity\Persoon;
use App\Entity\Registration;
use App\Entity\task;
use App\Entity\Training;
use App\Form\Type\InstructeurType;
use App\Form\Type\PersoonType;
use App\Form\Type\TaskType;
use App\Form\Type\TrainingType;
use App\Log\CustomLogger;
use App\Repository\RegistrationRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Psr\Log\LoggerInterface;
use App\Service\MessageGenerator;

/**
  * Require ROLE_ADMIN for *every* controller method in this class.
  *
  * @IsGranted("ROLE_ADMIN")
  */



class AdminController extends AbstractController
{
    private $logger;

    /**
          * Require ROLE_ADMIN for only this controller method.
          *
          * @IsGranted("ROLE_ADMIN")
          */

    public function __construct(LoggerInterface $coenLogger)
    {
        $this->logger = $coenLogger;
    }


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
        $user = $this->getUser()->getUsername();
        $user_id = $this->getUser()->getId();
        $this->logger->debug( "user opened admin home page", ["user" => $user, "user_ID" => $user_id]);

        return $this->render('admin/index.html.twig', [
        ]);
    }
//route voor admins voor een overzicht voor de acties van trainingen
    /**
     * @Route("/admin/trainingen")
     */

    public function trainingen(LoggerInterface $coenLogger) {
        $user = $this->getUser()->getUsername();
        $user_id = $this->getUser()->getId();
        $coenLogger->debug( "user: ". $user . " with id: " . $user_id . " opened admin homepage");

        return $this->render('admin/trainingen.html.twig', [
        ]);
    }

    //route voor admins voor een overzicht van alle trainingen
    /**
     * @Route("/admin/training_overzicht", name="training_overzicht")
     */

    public function training_overzicht(LoggerInterface $coenLogger) {
        $entityManager = $this->getDoctrine()->getManager();

        $trainingen = $entityManager->getRepository(Training::class)->findAll();

        return $this->render('admin/training_overzicht.html.twig',  ['trainingen' => $trainingen]
        );
    }

    //route voor admins om een training te verwijderen
    /**
     * @Route("/admin/training_verwijderen/{id}", name="training_verwijderen")
     */

    public function training_verwijderen(LoggerInterface $coenLogger, $id) {
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

    public function training_wijzigen(LoggerInterface $coenLogger, Request $request, $id) {
        $entityManager = $this->getDoctrine()->getManager();

        $training = $entityManager->getRepository(Training::class)->find($id);

        $form = $this->createForm(TrainingType::class, $training);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $training=$form->getData();

            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($training);
            $entityManager->flush();
        }

        return $this->render('/admin/training_toevoegen.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    //route voor training toevoegen  in een andere controller voor de form
    /**
     * @Route("/admin/add_training")
     */

    public function add_training(LoggerInterface $coenLogger, Request $request)
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

    //route voor admins voor een overzicht van alle leden
    /**
     * @Route("/admin/leden_overzicht", name="leden_overzicht")
     */

    public function leden_overzicht(LoggerInterface $coenLogger) {
        $entityManager = $this->getDoctrine()->getManager();

        $leden = $entityManager->getRepository(Persoon::class)->findAll();

        return $this->render('admin/leden_overzicht.html.twig',  ['leden' => $leden]
        );
    }


    //route voor admins voor een overzicht van alle leden
    /**
     * @Route("/admin/disable_lid/{id}", name="lid_disable")
     */

    public function disable_lid(LoggerInterface $coenLogger, $id) {
        $entityManager = $this->getDoctrine()->getManager();

        $leden = $entityManager->getRepository(Persoon::class)->find($id);
        $leden->setRoles(["ROLE_USER"]);

        $entityManager->persist($leden);
        $entityManager->flush();

        return $this->render('admin/disable_lid.html.twig',  ['leden' => $leden]
        );
    }

    //route voor admins voor een overzicht van alle leden
    /**
     * @Route("/admin/instructeur_overzicht", name="instructeur_overzicht")
     */

    public function instructeur_overzicht() {
        $entityManager = $this->getDoctrine()->getManager();

        $leden = $entityManager->getRepository(Persoon::class)->findAll();

        return $this->render('admin/instructeur_overzicht.html.twig',  ['leden' => $leden, 'role' => ["ROLE_INSTRUCTEUR"]]
        );
    }

    //route voor admins om een instructeur te wijzigen
    /**
     * @Route("/admin/instructeur_wijzigen/{id}", name="instructeur_wijzigen")
     */

    public function instructeur_wijzigen(Request $request, $id) {
        $entityManager = $this->getDoctrine()->getManager();

        $instructeur = $entityManager->getRepository(Persoon::class)->find($id);

        $form = $this->createForm(InstructeurType::class, $instructeur);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $instr=$form->getData();

            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($instr);
            $entityManager->flush();
        }

        return $this->render('/admin/instructeur_wijzigen.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    //route voor admins om een instructeur toe te voegen
    /**
     * @Route("/admin/instructeur_toevoegen", name="instructeur_toevoegen")
     */

    public function instructeur_toevoegen(Request $request,UserPasswordEncoderInterface $passwordEncoder)
    {
        $person = new Persoon();

        $form = $this->createForm(PersoonType::class, $person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($person, $person->getPassword());
            $person->setPassword($password);
            $persoon=$form->getData();
            $persoon->setRoles(["ROLE_INSTRUCTEUR"]);

            $em=$this->getDoctrine()->getManager();
            $em->persist($persoon);
            $em->flush();

        }
        return $this->render('/admin/instructeur_toevoegen.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    //route voor admins om een instructeur te verwijderen
    /**
     * @Route("/admin/instructeur_verwijderen/{id}", name="instructeur_verwijderen")
     */

    public function instructeur_verwijderen($id) {
        $entityManager = $this->getDoctrine()->getManager();

        $instructeur = $entityManager->getRepository(Persoon::class)->find($id);

        $entityManager->remove($instructeur);
        $entityManager->flush();

        return $this->render('admin/instructeur_verwijderen.html.twig'
        );
    }

    //route voor admins om alle lessen per lid te zien
    /**
     * @Route("/admin/overzicht_les", name="les_o")
     */

    public function overzicht_les() {
        $entityManager = $this->getDoctrine()->getManager();

        $les = $entityManager->getRepository(Lesson::class)->findAll();

        return $this->render('admin/les_overzicht.html.twig',  ['les' => $les]
        );
    }

    //route voor admins om alle lessen per lid te zien
    /**
     * @Route("/admin/les_overzicht/{id}", name="lid_les")
     */

    public function les_overzicht(Persoon $persoon) {

        return $this->render('admin/lid_les_overzicht.html.twig',  ['persoon' => $persoon]
        );
    }

    //route voor admins voor een overzicht van alle instructeurs
    /**
     * @Route("/admin/instructeur_les_overzicht/{id}", name="instructeur_les")
     */

    public function instructeur_les_overzicht(Persoon $persoon) {
        $lessons = $persoon->getLessons();

        return $this->render('admin/instructeur_les_overzicht.html.twig',  ['lessons' => $lessons]
        );

    }

    //route voor admins om de omzet per instructeur te zien
    /**
     * @Route("/admin/instructeur_omzet/{id}", name="instructeur_omzet")
     */

    public function instructeur_omzet(Persoon $persoon,RegistrationRepository $repository,$id) {
        $i = 0;

        $entityManager = $this->getDoctrine()->getManager();

        $instructeur = $entityManager->getRepository(Persoon::class)->find($id);

        $lesson = $entityManager->getRepository(Lesson::class)->findBy([
            'instructeur' => $instructeur->getId(),
        ]);

        foreach($lesson as $in) {
            $registration = $entityManager->getRepository(Registration::class)->findBy([
                'les' => $in
            ]);
            //$training = $lesson[$a]->getTraining();
            $training = $in->getTraining();
            //$kosten = $entityManager->getRepository(Training::class)->findBy();
            //dd($registration, $instr, $lesson, $training);
            $aantal=count($registration);
           // dd($aantal);
                $i = $i + ( $aantal *$training->getKosten());
            }

            //dd($registration, $instr, $lesson, $training, $i);

        return $this->render('admin/instructeur_omzet.html.twig',  ['lessons' => $lesson, 'i' => $i]
        );

    }









}