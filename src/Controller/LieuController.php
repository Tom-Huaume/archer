<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LieuController extends AbstractController
{
    #[Route('/lieux', name: 'lieu_list')]
    public function list(): Response
    {
        //todo: Listing de tous les lieux enregistrés
        return $this->render('lieu/list.html.twig', [
            'controller_name' => 'LieuController',
        ]);
    }

    #[Route('/lieux/details/{id}', name: 'lieu_details')]
    public function details(int $id): Response
    {
        return $this->render('lieu/details.html.twig');
    }

    #[Route('/lieux/create', name: 'lieu_create')]
    public function create(): Response
    {
        return $this->render('lieu/create.html.twig');
    }

    #[Route('/lieux/update/{id}', name: 'lieu_update')]
    public function update(int $id): Response
    {
        return $this->render('lieu/update.html.twig');
    }

    #[Route('/lieux/delete/{id}', name: 'lieu_delete')]
    public function delete(int $id): Response
    {
        return $this->render('lieu/delete.html.twig');
    }
}
