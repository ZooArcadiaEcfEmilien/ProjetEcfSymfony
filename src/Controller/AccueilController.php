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
    // Récupérer les avis validés
    $avis = $avisRepository->findBy(['validationAvis' => true]);

    // Créer un nouvel objet AvisEntity
    $nouvelAvis = new AvisEntity();
    $form = $this->createForm(AvisEntityType::class, $nouvelAvis);
    $form->handleRequest($request);

    // Récupérer les horaires
    $horaires = $horairesRepository->find(2); // Les horaires sont stockés dans la base de données avec un identifiant de 2

    if ($form->isSubmitted() && $form->isValid()) {
        // Si le formulaire est soumis et valide, sauvegarder le nouvel avis
        $this->entityManager->persist($nouvelAvis);
        $this->entityManager->flush();

        // Rediriger vers la page d'accueil après la soumission du formulaire
        return $this->redirectToRoute('app_accueil');
    }

    // Passer le formulaire, les avis et les horaires à la vue
    return $this->render('Accueil.html.twig', [
        'avis' => $avis,
        'form' => $form->createView(),
        'horaires' => $horaires, // Ajoutez cette ligne pour passer les horaires à la vue
    ]);
}

}

// http://127.0.0.1:8000/accueil