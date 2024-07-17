<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document */
class Product
{
    /** @MongoDB\Id */
    private $id;

    /** @MongoDB\Field(type="string") */
    private $title;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}


$product = new Product();
$product->setTitle('Test Product');
//$dm->persist($product);
//$dm->flush();
