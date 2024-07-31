<?php

require_once 'vendor/autoload.php';

use App\Document\Product;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use MongoDB\Client;
echo"CREATE_PRODUCT";
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

echo"CREATE_PRODUCT -> URIMONGO ok";

// Créez une configuration pour le gestionnaire de documents
$config = new Configuration();
$config->setProxyDir(__DIR__ . '/proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__ . '/hydrators');
$config->setHydratorNamespace('Hydrators');

echo"CREATE_PRODUCT -> CONFIG ok";

// Utilisez l'annotation reader pour les annotations de mapping
$reader = new AnnotationReader();
$driver = new AnnotationDriver($reader, [__DIR__ . '/src/Document']);
$config->setMetadataDriverImpl($driver);

// Créez le gestionnaire de documents avec l'URI MongoDB
$client = new Client($mongoUri);
$dm = DocumentManager::create($client, $config);

// Créez un nouvel objet Product
$product = new Product();
$product->setTitle('Test Product');
echo"CREATE_PRODUCT : PRODUIT CREER ! ";

// Persistence de l'objet dans la base de données
$dm->persist($product);
$dm->flush();
echo"CREATE_PRODUCT : PRODUIT PERSISTE ! et flush \n";

echo "Product created with ID: " . $product->getId() . "\n";
echo "Title: " . $product->getTitle() . "\n";