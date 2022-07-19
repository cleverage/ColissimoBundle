<?php

namespace CleverAge\ColissimoBundle\Model\Tracking\Response;

use CleverAge\ColissimoBundle\Model\BaseResponseModel;

class RemovalPoint extends BaseResponseModel
{
    private ?string $siteName = null;
    private ?string $siteCode = null;
    private ?string $endOfWithdrawDate = null;
    private ?string $address0 = null;
    private ?string $address1 = null;
    private ?string $address2 = null;
    private ?string $address3 = null;
    private ?string $zipCode = null;
    private ?string $city = null;
    private ?string $countryName = null;
    private ?string $countryCodeISO = null;

    public function getSiteName(): ?string
    {
        return $this->siteName;
    }

    public function setSiteName(?string $siteName): RemovalPoint
    {
        $this->siteName = $siteName;

        return $this;
    }

    public function getSiteCode(): ?string
    {
        return $this->siteCode;
    }

    public function setSiteCode(?string $siteCode): RemovalPoint
    {
        $this->siteCode = $siteCode;

        return $this;
    }

    public function getEndOfWithdrawDate(): ?string
    {
        return $this->endOfWithdrawDate;
    }

    public function setEndOfWithdrawDate(?string $endOfWithdrawDate): RemovalPoint
    {
        $this->endOfWithdrawDate = $endOfWithdrawDate;

        return $this;
    }

    public function getAddress0(): ?string
    {
        return $this->address0;
    }

    public function setAddress0(?string $address0): RemovalPoint
    {
        $this->address0 = $address0;

        return $this;
    }

    public function getAddress1(): ?string
    {
        return $this->address1;
    }

    public function setAddress1(?string $address1): RemovalPoint
    {
        $this->address1 = $address1;

        return $this;
    }

    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    public function setAddress2(?string $address2): RemovalPoint
    {
        $this->address2 = $address2;

        return $this;
    }

    public function getAddress3(): ?string
    {
        return $this->address3;
    }

    public function setAddress3(?string $address3): RemovalPoint
    {
        $this->address3 = $address3;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(?string $zipCode): RemovalPoint
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): RemovalPoint
    {
        $this->city = $city;

        return $this;
    }

    public function getCountryName(): ?string
    {
        return $this->countryName;
    }

    public function setCountryName(?string $countryName): RemovalPoint
    {
        $this->countryName = $countryName;

        return $this;
    }

    public function getCountryCodeISO(): ?string
    {
        return $this->countryCodeISO;
    }

    public function setCountryCodeISO(?string $countryCodeISO): RemovalPoint
    {
        $this->countryCodeISO = $countryCodeISO;

        return $this;
    }
}
