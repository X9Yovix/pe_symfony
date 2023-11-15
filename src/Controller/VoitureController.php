<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Form\VoitureFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VoitureController extends AbstractController
{
    #[Route('/voitures', name: 'voitures')]
    public function listeVoitures(EntityManagerInterface $em): Response
    {
        $voitures = $em->getRepository(Voiture::class)->findAll();
        return $this->render('voiture/liste_voiture.html.twig', ['liste_voitures' => $voitures]);
    }

    #[Route('/voiture/ajouter', name: 'ajouter_voiture')]
    public function ajouterVoiture(): Response
    {
        $voiture = new Voiture();
        $form = $this->createForm(VoitureFormType::class, $voiture);
        return $this->render('voiture/ajouter_voiture.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
