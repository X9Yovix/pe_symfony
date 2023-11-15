<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Form\MajVoitureType;
use App\Form\VoitureFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
    public function ajouterVoiture(Request $request, EntityManagerInterface $em): Response
    {
        $voiture = new Voiture();
        $form = $this->createForm(VoitureFormType::class, $voiture);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($voiture);
            $em->flush();
            return $this->redirectToRoute('voitures');
        }

        return $this->render('voiture/ajouter_voiture.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/voiture/supprimer/{id}', name: 'voiture_delete')]
    public function supprimerVoiture($id, EntityManagerInterface $em): Response
    {
        $voiture = $em->getRepository(Voiture::class)->find($id);
        if ($voiture != null) {
            $em->remove($voiture);
            $em->flush();
        } else {
            throw new \Exception('Voiture non trouvée');
        }
        return $this->redirectToRoute('voitures');
    }

    #[Route('/voiture/update/{id}', name: 'voiture_update')]
    public function majVoiture($id, EntityManagerInterface $em): Response
    {
        $voiture = $em->getRepository(Voiture::class)->find($id);
        $form = $this->createForm(MajVoitureType::class, $voiture);

        return $this->render('voiture/maj_voiture.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
