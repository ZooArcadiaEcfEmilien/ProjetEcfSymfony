<?php

require_once 'vendor/autoload.php';

use App\Document\Product;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\Persistence\Mapping\Driver\MappingDriver;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use MongoDB\Client;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver as DoctrineAnnotationDriver;

// Créez une configuration
$config = new Configuration();
$config->setProxyDir(__DIR__ . '/proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__ . '/hydrators');
$config->setHydratorNamespace('Hydrators');

// Utilisez l'annotation reader pour les annotations de mapping
$reader = new AnnotationReader();
$driver = new AnnotationDriver($reader, [__DIR__ . '/src/Document']);
$config->setMetadataDriverImpl($driver);

// Créez le gestionnaire de documents
$client = new Client('mongodb://DbNameEcfZoo:DbMotDePasse-2024-Ecf-ZooArcadia@localhost:8090/?directConnection=true');
$dm = DocumentManager::create($client, $config);

// Créez un nouvel objet Product
$product = new Product();
$product->setTitle('Test Product');

// Persistence de l'objet dans la base de données
$dm->persist($product);
$dm->flush();

echo "Product created with ID: " . $product->getId() . "\n";
echo "Title: " . $product->getTitle() . "\n";
