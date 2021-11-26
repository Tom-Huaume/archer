<?php

namespace App\Controller;

use App\Repository\ArmeRepository;
use App\Repository\LieuRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    /**
     * @Route("/admin/general", name="admin_general")
     */
    public function general(
        ArmeRepository $armeRepository,
        LieuRepository $lieuRepository
    ): Response
    {
        $adresseClub = $lieuRepository->findHomeAddress();
        $armes = $armeRepository->findAll();

        return $this->render('admin/general.html.twig', [
            "armes" => $armes,
            "adresseClub" => $adresseClub
        ]);
    }


}