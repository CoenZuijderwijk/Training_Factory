<?php


namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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


}