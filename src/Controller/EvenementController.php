<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EvenementType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EvenementController extends AbstractController
{
    #[Route('/admin/evenement', name: 'evenement_create')]
    public function create(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {

        //générer le formulaire de création
        $evenement = new Evenement();
        $evenementForm = $this->createForm(EvenementType::class, $evenement);
        $evenementForm->handleRequest($request);

        if($evenementForm->isSubmitted() && $evenementForm->isValid())
        {
            $entityManager->persist($evenement);
            $entityManager->flush();

            $this->addFlash('success', 'Evènement engristré');
            return $this->redirectToRoute('evenement_create');
        }

        return $this->render('evenement/create.html.twig', [
            'evenementForm' => $evenementForm->createView(),
        ]);
    }


}
