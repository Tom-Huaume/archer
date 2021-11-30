<?php

namespace App\Controller;

use App\Entity\Lieu;
use App\Form\LieuType;
use App\Repository\LieuRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function create(
        Request $request,
        LieuRepository $lieuRepository,
        EntityManagerInterface $entityManager
    ): Response
    {
        //afficher la liste des lieux
        $lieux = $lieuRepository->findAll();

        //générer le formulaire de création
        $lieu = new Lieu();
        $lieuForm = $this->createForm(LieuType::class, $lieu);

        $lieuForm->handleRequest($request);

        if($lieuForm->isSubmitted() && $lieuForm->isValid()){

            $lieu->setClub(0);
            $entityManager->persist($lieu);
            $entityManager->flush();

            $this->addFlash('success', 'Lieu engristré');
            //return $this->redirectToRoute()
        }

        return $this->render('lieu/create.html.twig', [
            'lieuForm' => $lieuForm->createView(),
            'listLieux' => $lieux
        ]);
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
