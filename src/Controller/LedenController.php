<?php


namespace App\Controller;


use App\Entity\Persoon;
use App\Entity\Registration;
use App\Form\Type\PersoonType;
use App\Form\Type\RegistrationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Require ROLE_LID for *every* controller method in this class.
 *
 * @IsGranted("ROLE_LID")
 */


class LedenController extends AbstractController
{
// route voor de homepagina van de leden
    /**
     * @Route("/leden/home")
     */
    public function ledenhomepage() {

        return $this->render('leden/index.html.twig', [
        ]);
    }


// route voor de homepagina van de leden
    /**
     * @Route("/leden/profiel_wijzigen", name="profiel_wijzigen")
     */
    public function profiel_wijzigen(Request $request,UserPasswordEncoderInterface $passwordEncoder) {
        $id = $this->getUser()->getId();
        $entityManager = $this->getDoctrine()->getManager();

        $persoon = $entityManager->getRepository(Persoon::class)->find($id);

        $form = $this->createForm(PersoonType::class, $persoon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($persoon, $persoon->getPassword());
            $persoon->setPassword($password);
            $persoon=$form->getData();

            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($persoon);
            $entityManager->flush();

            return $this->redirectToRoute('app_leden_ledenhomepage');
        }
        return $this->render('/leden/profiel_wijzigen.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    //route voor leden om alle lessen te zien en in te schrijven
    /**
     * @Route("/leden/overzicht", name="overzicht_les")
     */

    public function overzicht() {
        $entityManager = $this->getDoctrine()->getManager();

        $user = $this->getUser()->getId();
        $persoon = $entityManager->getRepository(Persoon::class)->find($user);

        return $this->render('leden/les_overzicht.html.twig',  ['persoon' => $persoon]
        );
    }

    //route voor leden om in te schrijven voor een les
    /**
     * @Route("/leden/les_inschrijven", name="inschrijven_les")
     */

    public function les_inschrijven(Request $request) {
        $reg = new Registration();

        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(RegistrationType::class, $reg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reg=$form->getData();
            $user = $this->getUser();
            $reg->setPersoon($user);
            $reg->setPayment("false");
            //dd($reg);
            $em->persist($reg);
            $em->flush();

            return $this->redirectToRoute('overzicht_les',  []
            );
        }
        return $this->render('/bezoekers/Inschrijven.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    //route voor leden om zich uit te schrijven van een les
    /**
     * @Route("/leden/uitschrijven/{id}", name="uitschrijven_les")
     */

    public function uitschrijven_les($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $uitschrijven = $entityManager->getRepository(Registration::class)->find($id);

        $entityManager->remove($uitschrijven);
        $entityManager->flush();

        $user = $this->getUser()->getId();
        $persoon = $entityManager->getRepository(Persoon::class)->find($user);

        return $this->redirectToRoute('overzicht_les',  ['persoon' => $persoon]
        );
    }


}