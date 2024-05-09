<?php

namespace App\Controller;

use App\Entity\UserTabEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class ConnexionController extends AbstractController
{
    #[Route('/connexion', name: 'app_connexion')]
        public function index(AuthenticationUtils $authenticationUtils): Response    
        {
            $error = $authenticationUtils->getLastAuthenticationError();
            $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('Connexion.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }
}
