<?php

namespace CleverAge\ColissimoBundle\Model\Shipping\Letter;

class Article
{
    private string $description;
    private int $quantity;
    private int $weight;
    private int $value;

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Article
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): Article
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): Article
    {
        $this->weight = $weight;

        return $this;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): Article
    {
        $this->value = $value;

        return $this;
    }
}
