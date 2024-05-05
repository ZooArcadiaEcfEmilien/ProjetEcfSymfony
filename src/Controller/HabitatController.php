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
}
