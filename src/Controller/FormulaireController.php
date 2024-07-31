<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ForumlaireEntityType;
use App\Repository\FormulaireEntityRepository;
use App\Entity\FormulaireEntity;
use Doctrine\ORM\EntityManagerInterface;

class FormulaireController extends AbstractController
{
    #[Route('/formulaire', name: 'app_formulaire', methods: ['GET', 'POST'])]
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public function index(FormulaireEntityRepository $formulaireRespository, Request $request): Response
    {
        $nouveauFormulaire = new FormulaireEntity();
        $form = $this->createForm(ForumlaireEntityType::class, $nouveauFormulaire);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $this->entityManager->persist($nouveauFormulaire);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_formulaire');
        }

        return $this->render('Formulaire.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

