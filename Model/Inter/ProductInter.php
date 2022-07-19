<?php

namespace CleverAge\ColissimoBundle\Model\Inter;

class ProductInter
{
    private string $productCode;
    private bool $insurance = false;
    private bool $nonMachinable = false;
    private bool $returnReceipt = false;
    private string $countryCode;
    private string $zipCode;

    public function getProductCode(): string
    {
        return $this->productCode;
    }

    public function setProductCode(string $productCode): ProductInter
    {
        $this->productCode = $productCode;

        return $this;
    }

    public function isInsurance(): bool
    {
        return $this->insurance;
    }

    public function setInsurance(bool $insurance): ProductInter
    {
        $this->insurance = $insurance;

        return $this;
    }

    public function isNonMachinable(): bool
    {
        return $this->nonMachinable;
    }

    public function setNonMachinable(bool $nonMachinable): ProductInter
    {
        $this->nonMachinable = $nonMachinable;

        return $this;
    }

    public function isReturnReceipt(): bool
    {
        return $this->returnReceipt;
    }

    public function setReturnReceipt(bool $returnReceipt): ProductInter
    {
        $this->returnReceipt = $returnReceipt;

        return $this;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): ProductInter
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): ProductInter
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'productCode' => $this->getProductCode(),
            'insurance' => $this->isInsurance(),
            'nonMachinable' => $this->isNonMachinable(),
            'returnReceipt' => $this->isReturnReceipt(),
            'countryCode' => $this->getCountryCode(),
            'zipCode' => $this->getZipCode(),
        ];
    }
}
