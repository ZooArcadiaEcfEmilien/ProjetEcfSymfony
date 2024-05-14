<?php

namespace App\Controller;

use App\Repository\HabitatEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HabitatController extends AbstractController
{
    #[Route('/habitats', name: 'app_habitat')]
    public function index(HabitatEntityRepository $habitatRepository): Response
    {
        $habitats = $habitatRepository->findAll();

        return $this->render('Habitat.html.twig', [
            'habitats' => $habitats,
        ]);
    }

    #[Route('/habitat/{habitatId}/animals', name: 'app_animal_list')]
public function animalList($habitatId, HabitatEntityRepository $habitatRepository): Response
{
    $habitat = $habitatRepository->find($habitatId);
    $animals = $habitat->getAnimalEntities();

    return $this->render('Animal/animal_list.html.twig', [
        'habitat' => $habitat,
        'animals' => $animals,
    ]);
}
}
