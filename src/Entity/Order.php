<?php

namespace App\Entity;

use Documents\Product;

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
     * @var \Documents\Product
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
        $this->productId = $product->getId();
        $this->product = $product;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }
}