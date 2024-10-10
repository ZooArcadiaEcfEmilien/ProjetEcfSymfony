<?php

namespace App\Controller;

use App\Form\AvisEntityType;
use App\Repository\AvisEntityRepository;
use App\Entity\AvisEntity;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\HorairesRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\RequestHandlerInterface;


class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil', methods: ['GET', 'POST'])]
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function index(AvisEntityRepository $avisRepository, Request $request, HorairesRepository $horairesRepository): Response
    {
        $avis = $avisRepository->findBy(['validationAvis' => true]);

        $nouvelAvis = new AvisEntity();
        $form = $this->createForm(AvisEntityType::class, $nouvelAvis);
        $form->handleRequest($request);

        $horaires = $horairesRepository->find(2); // Les horaires sont stockés dans la base de données avec un identifiant de 2

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($nouvelAvis);
            $this->entityManager->flush();
            return $this->redirectToRoute('app_accueil');
        }

        return $this->render('Accueil.html.twig', [
            'avis' => $avis,
            'form' => $form->createView(),
            'horaires' => $horaires,
        ]);
    }
}