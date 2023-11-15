<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    #[Route('/etudiant', name: 'app_etudiant')]
    public function index(): Response
    {
        return new Response("Bonjour mes étudiants");
    }

    /* #[Route('/etudiant/{id}', name: 'affichage_etudiant')]
    public function affichageEtudiant($id): Response
    {
        return new Response("Bonjour étudiant ayant l'id : " . $id);
    }
    */

    #[Route('/etudiant/{name}', name: 'etudiant_name')]
    public function voirNom($name): Response
    {
        return $this->render('/etudiant/etudiant.html.twig', ['name' => $name]);
    }
}
