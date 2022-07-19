<?php

namespace CleverAge\ColissimoBundle\Model\Shipping\Letter;

abstract class BaseAddress
{
    private string $line0 = '';
    private string $line1 = '';
    private string $line2 = '';
    private string $line3 = '';
    private string $countryCode = '';
    private string $city = '';
    private string $zipCode = '';

    public function getLine0(): string
    {
        return $this->line0;
    }

    public function setLine0(string $line0): BaseAddress
    {
        $this->line0 = $line0;

        return $this;
    }

    public function getLine1(): string
    {
        return $this->line1;
    }

    public function setLine1(string $line1): BaseAddress
    {
        $this->line1 = $line1;

        return $this;
    }

    public function getLine2(): string
    {
        return $this->line2;
    }

    public function setLine2(string $line2): BaseAddress
    {
        $this->line2 = $line2;

        return $this;
    }

    public function getLine3(): string
    {
        return $this->line3;
    }

    public function setLine3(string $line3): BaseAddress
    {
        $this->line3 = $line3;

        return $this;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): BaseAddress
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): BaseAddress
    {
        $this->city = $city;

        return $this;
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): BaseAddress
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'line0' => $this->getLine0(),
            'line1' => $this->getLine1(),
            'line2' => $this->getLine2(),
            'line3' => $this->getLine3(),
            'countryCode' => $this->getCountryCode(),
            'city' => $this->getCity(),
            'zipCode' => $this->getZipCode(),
        ];
    }
}
