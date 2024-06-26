<?php
require 'vendor/autoload.php'; // Inclure l'autoload de Composer

use App\Entity\AnimalEntity;
use App\Document\AnimalLike;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpKernel\KernelInterface;

// Charger les variables d'environnement
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

// Initialiser le kernel de Symfony pour accéder aux services
require __DIR__.'/config/bootstrap.php'; // Chemin vers votre fichier bootstrap.php du kernel Symfony

// Récupérer l'instance du kernel
/** @var KernelInterface $kernel */
$kernel = new App\Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']); // Adapter le chemin et les paramètres selon votre configuration
$kernel->boot();

// Accéder au container Symfony
$container = $kernel->getContainer();

// Accéder aux services nécessaires
$entityManager = $container->get('doctrine.orm.entity_manager');
$documentManager = $container->get('doctrine_mongodb.odm.document_manager');

// Récupérer tous les animaux depuis MySQL
$animals = $entityManager->getRepository(AnimalEntity::class)->findAll();

foreach ($animals as $animal) {
    // Vérifier si un document existe déjà pour cet animal
    $animalLikes = $documentManager->getRepository(AnimalLike::class)->findOneBy(['name' => $animal->getName()]);

    if (!$animalLikes) {
        // Créer un nouveau document AnimalLike
        $animalLikes = new AnimalLike();
        $animalLikes->setName($animal->getName());
        $animalLikes->setLikeCount(0); // Initialiser le compteur de likes à 0
        $documentManager->persist($animalLikes);
    }
}

$documentManager->flush();

echo "Documents ajoutés dans MongoDB avec succès.";
