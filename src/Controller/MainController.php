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
        echo "coucou";
        die();
    }
}