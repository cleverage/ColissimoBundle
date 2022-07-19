<?php

namespace CleverAge\ColissimoBundle\Model\Shipping\Letter;

class Parcel
{
    private int $weight;
    private ?string $pickupLocationId = null;

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): Parcel
    {
        $this->weight = $weight;

        return $this;
    }

    public function getPickupLocationId(): ?string
    {
        return $this->pickupLocationId;
    }

    public function setPickupLocationId(?string $pickupLocationId): Parcel
    {
        $this->pickupLocationId = $pickupLocationId;

        return $this;
    }

    public function toArray(): array
    {
        $base = ['weight' => $this->getWeight()];
        if ($pickupLocationId = $this->getPickupLocationId()) {
            $base['pickupLocationId'] = $pickupLocationId;
        }

        return $base;
    }
}
