<?php

namespace App\Entity;

use App\Document\Product;

/**
 * @Entity
 * @Table(name="orders")
 */
class Order
{
    /**
     * @Id @Column(type="int")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $productId;

    /**
     * @var \App\Document\Product
     */
    private $product;

    public function getId(): ?int
    {
        echo"ENTITE_ORDER : GET ID";

        return $this->id;
    }

    public function getProductId(): ?string
    {
        echo"ENTITE_ORDER : GET PRODUCT ID";
        return $this->productId;
    }
    
    public function setProduct(Product $product): void
    {
        echo"ENTITE_ORDER : SET PRODUCT";
        $this->productId = $product->getId();
        $this->product = $product;
        echo"ENTITE_ORDER : SET PRODUCT OK";
    }

    public function getProduct(): ?Product
    {
        echo"ENTITE_ORDER : GET PRODUCT";
        return $this->product;
    }
}
/*echo"test 6";
$order = new Order(); // CREER  UN ANIMAL
echo"test 7";
$order->setProduct($product);  // ASSOCIE ANIMAL AU COMPTEUR MONGO
echo"test 8";
$em->persist($order);
echo"test 9";
$em->flush();
echo"test 10";*/