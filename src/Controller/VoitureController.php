<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoitureController extends AbstractController
{
    #[Route('/voiture', name: 'voiture')]
    public function listeVoitures(): Response
    {
        return $this->render('voiture/liste_voiture.html.twig', []);
    }
}
