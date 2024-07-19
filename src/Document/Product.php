<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
echo"DOCUMENT_PRODUCT \n";

/**
 * @MongoDB\Document
 */
class Product
{
    /** @MongoDB\Id */
    private $id;

    /** @MongoDB\Field(type="string") */
    private $title;

    public function getId(): ?string
    {
        echo"DOCUMENT_PRODUCT : GET ID \n";

        return $this->id;
    }

    public function getTitle(): ?string
    { 
        echo"DOCUMENT_PRODUCT : GET TITLE \n";

        return $this->title;
    }

    public function setTitle(string $title): void
    {
        echo"DOCUMENT_PRODUCT : SET TITLE \n";
        $this->title = $title;
    }
}


$product = new Product();
echo"DOCUMENT_PRODUCT produit créer \n";

$product->setTitle('Test Product');

echo"DOCUMENT_PRODUCT $ product INSTANCIER \n";

//$dm->persist($product);
//$dm->flush();
