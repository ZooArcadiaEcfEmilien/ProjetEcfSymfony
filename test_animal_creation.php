<?php

require_once 'vendor/autoload.php';

use App\Entity\AnimalEntity;
use Doctrine\ORM\EntityManagerInterface;
use Proxies\__CG__\App\Entity\HabitatEntity;
use Symfony\Component\Dotenv\Dotenv;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use MongoDB\Client;
use App\Document\AnimalCounter;
use Psr\Container\ContainerInterface;
echo "CREATEZ TEST \n";

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
echo "CREATEZ TEST : URIMONGO ok \n";

// Créez une configuration pour le gestionnaire de documents
$config = new Configuration();
$config->setProxyDir(__DIR__ . '/proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__ . '/hydrators');
$config->setHydratorNamespace('Hydrators');
echo "CREATEZ TEST : CONFIG ok \n";

// Utilisez l'annotation reader pour les annotations de mapping
$reader = new AnnotationReader();
$driver = new AnnotationDriver($reader, [__DIR__ . '/src/Document']);
$config->setMetadataDriverImpl($driver);

// Créez le gestionnaire de documents avec l'URI MongoDB
$client = new Client($mongoUri);
$dm = DocumentManager::create($client, $config);

// Récupérer l'EntityManager
$em = $container->get('doctrine.orm.entity_manager');

// Create and persist HabitatEntity
$habitatEntity = new HabitatEntity();
$habitatEntity->setHabitatNom('Example Habitat mongo'); // Assuming HabitatEntity has a setName method
$habitatEntity->setHabitatDescription('Example Description mongo'); // Assuming HabitatEntity has a setDescription method
$habitatEntity->setHabitatImage('Example Image mongo'); // Assuming HabitatEntity has a setImage method
$em->persist($habitatEntity);
$em->flush();

// Créez une instance de AnimalEntity et persistez-la
$animalEntity = new AnimalEntity();
$animalEntity->setName('Example Animal');
$animalEntity->setDatePassage(new \DateTime());
$animalEntity->setAnimalCounter(new AnimalCounter());
$animalEntity->setRace('setrace CREATEZ TEST');
$animalEntity->setHabitatDeLAnimal($habitatEntity);

$em->persist($animalEntity);
//$em->flush();

echo "AnimalEntity persisted with ID: " . $animalEntity->getId() . "\n";

// Associer AnimalCounter à AnimalEntity
$animalCounter = new AnimalCounter();
//$animalCounter->setAnimalEntityId($animalEntity->getId());
$animalCounter->setAnimalEntityName($animalEntity->getName());
$animalCounter->setCounter(0);

$dm->persist($animalCounter);
$dm->flush();

echo "AnimalCounter persisted with ID: " . $animalCounter->getId() . "\n";
