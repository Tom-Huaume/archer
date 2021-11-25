<?php

namespace App\Controller;

use App\Entity\Arme;
use Doctrine\ORM\EntityManagerInterface;
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

    #[Route('/arme/create', name: 'arme_create')]
    public function create(EntityManagerInterface $entityManager): Response
    {
        //créer instance entité
        $arme = new Arme();

        //remplir les propriétés
        $arme->setSigle("AC");
        $arme->setDesignation("Arc classique");

        $entityManager->persist($arme);
        //$entityManager->remove($arme);
        $entityManager->flush();

        return $this->render('arme/create.html.twig');
    }
}
