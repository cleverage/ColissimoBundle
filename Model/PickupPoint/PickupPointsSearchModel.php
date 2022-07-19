<?php

namespace CleverAge\ColissimoBundle\Model\PickupPoint;

class PickupPointsSearchModel
{
    private string $zipCode;
    private string $city;
    private string $countryCode;
    private string $shippingDate;

    public function __construct(string $zipCode, string $city, string $countryCode, string $shippingDate)
    {
        $this->zipCode = $zipCode;
        $this->city = $city;
        $this->countryCode = $countryCode;
        $this->shippingDate = $shippingDate;
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function getShippingDate(): string
    {
        return $this->shippingDate;
    }
}
