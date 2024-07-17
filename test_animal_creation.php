<?php

require_once 'vendor/autoload.php';

use App\Entity\AnimalEntity;
use App\Entity\HabitatEntity;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use MongoDB\Client;
use App\Document\AnimalCounter;

// Charger les variables d'environnement
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

// Boot Symfony Kernel
$kernel = new \App\Kernel('dev', true);
$kernel->boot();

/** @var ContainerInterface $container */
$container = $kernel->getContainer();

// Récupérer l'URI MongoDB depuis les paramètres
$mongoUri = $container->getParameter('mongodb_server');

// Créez une configuration pour le gestionnaire de documents
$config = new Configuration();
$config->setProxyDir(__DIR__ . '/proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__ . '/hydrators');
$config->setHydratorNamespace('Hydrators');

// Utilisez l'annotation reader pour les annotations de mapping
$reader = new AnnotationReader();
$driver = new AnnotationDriver($reader, [__DIR__ . '/src/Document']);
$config->setMetadataDriverImpl($driver);

// Créez le gestionnaire de documents avec l'URI MongoDB
$client = new Client($mongoUri);
$dm = DocumentManager::create($client, $config);

// Récupérer l'EntityManager
$em = $container->get('doctrine.orm.entity_manager');

// Créer et persister une nouvelle HabitatEntity
$habitat = new HabitatEntity();
$habitat->setHabitatNom("Nom de l'habitat");
$habitat->setHabitatDescription("Description de l'habitat");
$habitat->setHabitatImage("Image de l'habitat");
$em->persist($habitat);

// Créer et persister une nouvelle AnimalEntity
$testAnimal = new AnimalEntity();
$testAnimal->setName('animalNameTest');
$testAnimal->setRace('animalRaceTest');
$testAnimal->setImage('animalImageTest');
$testAnimal->setEtatAnimal('animalEtatTest');
$testAnimal->setNourritureType('animalNourritureTypeTest');
$testAnimal->setNourritureQuantite(0);
$testAnimal->setDatePassage(new \DateTime('now'));
$testAnimal->setHabitatDeLAnimal($habitat);

$em->persist($testAnimal);
$em->flush();
// Associer AnimalCounter à AnimalEntity

$animalCounter = new AnimalCounter();
$animalCounter->setAnimalEntityId($testAnimal->getId());
$animalCounter->setAnimalEntityName($testAnimal->getName());
$animalCounter->setCounter(0);

$dm->persist($animalCounter);
$dm->flush();
echo'AnimalCounter persisted with ID: ' . $animalCounter->getId() . "\n";
$testAnimal->setAnimalCounter($animalCounter);

$em->persist($testAnimal);
$em->flush();


echo "AnimalEntity persisted with ID: " . $testAnimal->getId() . "\n";