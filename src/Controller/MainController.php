<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class MainController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    /**
     * @Route("/", name="main_home")
     */
    public function home()
    {
        $eventTest1 = [
            "nom" => "Menhir cup",
            "concours" => 0,
        ];

        return $this->render('main/home.html.twig', [
            "ev1" => $eventTest1
        ]);
    }


}