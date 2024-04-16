<?php

namespace App\Controller;

use App\Entity\HabitatEntity;
use App\Service\AnimalCrud;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Entity\AnimalEntity;


class AnimalController extends AbstractController
{
    #[Route('/animal', name: 'app_animal')]
    public function index(): Response
    {
        return $this->render('animal/animal.html.twig', [
            'controller_name' => 'AnimalController',
        ]);
    }
    private $animalCrud;

    public function __construct(AnimalCrud $animalCrud)
    {
        $this->animalCrud = $animalCrud;
    }

    #[Route('/animal/add', name: 'animal_add')]
    public function addAnimal(string $name, string $race, HabitatEntity $habitat, $dateTime, string $detailsCommentaire, string $etatAnimal, int $nourritureQuantite, string $nourritureType
    ): Response {
        $this->animalCrud->addAnimal($name, $race, $habitat, $dateTime, $detailsCommentaire, $etatAnimal, $nourritureQuantite, $nourritureType);

        return new Response('Animal ajouté avec succès !');
    }
}



