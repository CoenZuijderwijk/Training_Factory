<?php


namespace App\Controller;


use App\Entity\Persoon;
use App\Entity\task;
use App\Form\Type\PersoonType;
use App\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class BezoekerController extends AbstractController
{
    //route voor de standaard homepagina
    /**
     * @Route("/", name="homepagina")
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

    //route voor inschrijven in een andere controller voor de form
    /**
     * @Route("/bezoekers/inschrijven")
     */

    public function Inschrijven(Request $request,UserPasswordEncoderInterface $passwordEncoder)
    {
        $person = new Persoon();

        $form = $this->createForm(PersoonType::class, $person);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($person, $person->getPassword());
            $person->setPassword($password);
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






}