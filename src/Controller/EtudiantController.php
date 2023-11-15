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
        $empty = [];
        $modules = [
            [
                "id" => 1,
                "nom" => "PHP",
                "nbrHeures" => 21
            ],
            [
                "id" => 2,
                "nom" => "Symfony",
                "nbrHeures" => 42
            ],
        ];
        return $this->render('/etudiant/liste.html.twig', ['etudiants' => $etudiants, 'modules' => $modules]);
        //return $this->render('/etudiant/liste.html.twig', ['etudiants' => $empty]);
    }

    #[Route('/affectation', name: 'affectation')]
    public function affecter(): Response
    {
        return $this->render('/etudiant/affectation.html.twig');
    }

    #[Route('/index', name: 'index_fils')]
    public function indexFils(): Response
    {
        return $this->render('/index.html.twig');
    }
}
