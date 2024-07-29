<?php 

namespace App\Controller;

use App\Document\Product;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test-mongo", name="test_mongo")
     */
    public function testMongo(DocumentManager $dm): Response
    {
        $product = new Product();
        $product->setTitle('Test Product');

        $dm->persist($product);
        $dm->flush();

        return new Response('Product created with ID: ' . $product->getId());
    }
}
