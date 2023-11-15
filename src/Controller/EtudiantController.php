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

    #[Route('/etudiant/{id}', name: 'affichage_etudiant', requirements: ['id' => '\d{2}'])]
    public function affichageEtudiant($id): Response
    {
        return new Response("Bonjour étudiant ayant l'id : " . $id);
    }


    #[Route('/etudiant/{name}', name: 'etudiant_name')]
    public function voirNom($name): Response
    {
        return $this->render('/etudiant/etudiant.html.twig', ['name' => $name]);
    }

    #[Route('/liste', name: 'liste_etudiants')]
    public function listeEtudiants(): Response
    {
        $etudiants = ['ali', 'said', 'hassan', 'fatima', 'amina'];
        return $this->render('/etudiant/liste.html.twig', ['etudiants' => $etudiants]);
    }
}
