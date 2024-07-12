<?php

namespace Documents;

/** @Document */
class Product
{
    /** @Id */
    private $id;

    /** @Field(type="string") */
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
