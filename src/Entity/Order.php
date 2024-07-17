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
        return $this->id;
    }

    public function getProductId(): ?string
    {
        return $this->productId;
    }
    
    public function setProduct(Product $product): void
    {
        echo"test 2";
        $this->productId = $product->getId();
        $this->product = $product;
        echo"test 3";
    }

    public function getProduct(): ?Product
    {
        echo"test 4";
        return $this->product;
    }
}
echo"test 6";
$order = new Order();
echo"test 7";
$order->setProduct($product);
echo"test 8";
$em->persist($order);
echo"test 9";
$em->flush();
echo"test 10";