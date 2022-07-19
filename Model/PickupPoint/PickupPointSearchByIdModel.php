<?php

namespace CleverAge\ColissimoBundle\Model\PickupPoint;

class PickupPointSearchByIdModel
{
    private string $id;
    private string $shippingDate;

    public function __construct(string $id, string $shippingDate)
    {
        $this->id = $id;
        $this->shippingDate = $shippingDate;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getShippingDate(): string
    {
        return $this->shippingDate;
    }
}
