<?php

namespace App\Controller;

use App\Entity\AnimalEntity;
use App\Form\AnimalEntityType;
use App\Repository\AnimalEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/animal')]
class AnimalController extends AbstractController
{
    #[Route('/', name: 'app_animal_index', methods: ['GET'])]
    public function index(AnimalEntityRepository $animalEntityRepository): Response
    {
        return $this->render('animal/index.html.twig', [
            'animal_entities' => $animalEntityRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_animal_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $animalEntity = new AnimalEntity();
        $form = $this->createForm(AnimalEntityType::class, $animalEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($animalEntity);
            $entityManager->flush();

            return $this->redirectToRoute('app_animal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('animal/new.html.twig', [
            'animal_entity' => $animalEntity,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_animal_show', methods: ['GET'])]
    public function show(AnimalEntity $animalEntity): Response
    {
        return $this->render('animal/show.html.twig', [
            'animal_entity' => $animalEntity,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_animal_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AnimalEntity $animalEntity, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AnimalEntityType::class, $animalEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_animal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('animal/edit.html.twig', [
            'animal_entity' => $animalEntity,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_animal_delete', methods: ['POST'])]
    public function delete(Request $request, AnimalEntity $animalEntity, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$animalEntity->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($animalEntity);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_animal_index', [], Response::HTTP_SEE_OTHER);
    }
}
