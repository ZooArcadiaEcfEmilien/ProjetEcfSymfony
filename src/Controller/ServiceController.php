<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ServiceTabEntityRepository;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(ServiceTabEntityRepository $serviceRepository): Response
    {
        $services = $serviceRepository->findAll();

        return $this->render('Service.html.twig', [
            'services' => $services,
        ]);
    }
}