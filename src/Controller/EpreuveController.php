<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EpreuveController extends AbstractController
{
    #[Route('/epreuve', name: 'epreuve')]
    public function index(): Response
    {
        return $this->render('epreuve/index.html.twig', [
            'controller_name' => 'EpreuveController',
        ]);
    }
}
