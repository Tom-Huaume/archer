<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArmeController extends AbstractController
{
    #[Route('/arme', name: 'arme')]
    public function index(): Response
    {
        return $this->render('arme/index.html.twig', [
            'controller_name' => 'ArmeController',
        ]);
    }
}
