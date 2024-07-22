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

// Charger les variables d'environnement
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

// Boot Symfony Kernel
$kernel = new \App\Kernel('dev', true);
$kernel->boot();

/** @var ContainerInterface $container */
$container = $kernel->getContainer();
echo "test_animal_creatio : GetCONTAINER ok \n";
// Récupérer l'URI MongoDB depuis les paramètres
$mongoUri = $container->getParameter('mongodb_server');
echo "test_animal_creation : URIMONGO ok \n";

// Créez une configuration pour le gestionnaire de documents
$config = new Configuration();
$config->setProxyDir(__DIR__ . '/proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__ . '/hydrators');
$config->setHydratorNamespace('Hydrators');
echo "test_animal_creation : CONFIG ok \n";

// Utilisez l'annotation reader pour les annotations de mapping
$reader = new AnnotationReader();
echo " test_animal_creation : AnnotationReader ok \n";
$driver = new AnnotationDriver($reader, [__DIR__ . '/src/Document']);
echo "test_animal_creation : AnnotationDriver ok \n";
$config->setMetadataDriverImpl($driver);
echo "test_animal_creation : setMetadataDriverImpl ok \n";

// Créez le gestionnaire de documents avec l'URI MongoDB
$client = new Client($mongoUri);
echo "test_animal_creation : Client ok \n";
$dm = DocumentManager::create($client, $config);
echo "test_animal_creation : DocumentManager ok \n";
// Récupérer l'EntityManager
//$em = $container->get('doctrine.orm.entity_manager');
//echo "test_animal_creation : EntityManager ok \n";

// Create and persist HabitatEntity
//$habitatEntity = new HabitatEntity();
//$habitatEntity->setHabitatNom('Example Habitat mongo'); // Assuming HabitatEntity has a setName method
//echo "test_animal_creation : HabitatEntity créer $habitatEntity \n";
//$habitatEntity->setHabitatDescription('Example Description mongo'); // Assuming HabitatEntity has a setDescription method
//echo "test_animal_creation : HabitatEntity créer $habitatEntity \n";
//$habitatEntity->setHabitatImage('Example Image mongo'); // Assuming HabitatEntity has a setImage method
//echo "test_animal_creation : HabitatEntity créer $habitatEntity \n";
//$em->persist($habitatEntity);
//$em->flush();
//echo "test_animal_creation : HabitatEntity créer persisté/flushé \n";
//echo "Habitat entité $habitatEntity->getHabitatNom \n";
// Créez une instance de AnimalEntity et persistez-la
//$animalEntity = new AnimalEntity();
//$animalEntity->setName('Example Animal');
//$animalEntity->setDatePassage(new \DateTime());
//$animalEntity->setAnimalCounter(new AnimalCounter());
//$animalEntity->setRace('setrace CREATEZ TESTzzz');
//echo "test_animal_creation : AnimalEntity créer $animalEntity \n";
//$animalEntity->setHabitatDeLAnimal($habitatEntity);

//$em->persist($animalEntity);
//echo "test_animal_creation : AnimalEntity persisté \n";
//$em->flush();
//echo "test_animal_creation : AnimalEntity flushé \n";

//echo "test_animal_creation : AnimalEntity persisted with ID: " . $animalEntity->getId() . "\n";

// Associer AnimalCounter à AnimalEntity
$animalCounter = new AnimalCounter();
//$animalCounter->setAnimalEntityId($animalEntity->getId());
//$animalCounter->setAnimalEntityName($animalEntity->getName());
//$animalCounter->setCounter(0);
//echo "test_animal_creation : AnimalCounter créer \n";

$dm->persist($animalCounter);
$dm->flush();

echo "AnimalCounter persisted with ID: " . $animalCounter->getId() . "\n";
echo "AnimalCounter counter: " . $animalCounter->getCounter() . "\n";
echo "AnimalCounter animalEntityName: " . $animalCounter->getAnimalEntityName() . "\n";
echo "AnimalCounter animalEntityId: " . $animalCounter->getAnimalEntityId() . "\n";