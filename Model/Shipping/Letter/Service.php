<?php

namespace CleverAge\ColissimoBundle\Model\Shipping\Letter;

class Service
{
    private string $productCode;
    private string $depositDate;
    private ?string $transportationAmont = null;
    private ?string $totalAmount = null;
    private string $orderNumber;
    private ?string $commercialName = null;
    private ?string $returnTypeChoice = null;

    public function getProductCode(): string
    {
        return $this->productCode;
    }

    public function setProductCode(string $productCode): Service
    {
        $this->productCode = $productCode;

        return $this;
    }

    public function getDepositDate(): string
    {
        return $this->depositDate;
    }

    public function setDepositDate(string $depositDate): Service
    {
        $this->depositDate = $depositDate;

        return $this;
    }

    public function getTransportationAmont(): ?string
    {
        return $this->transportationAmont;
    }

    public function setTransportationAmont(?string $transportationAmont): Service
    {
        $this->transportationAmont = $transportationAmont;

        return $this;
    }

    public function getTotalAmount(): ?string
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(?string $totalAmount): Service
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    public function setOrderNumber(string $orderNumber): Service
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    public function getCommercialName(): ?string
    {
        return $this->commercialName;
    }

    public function setCommercialName(?string $commercialName): Service
    {
        $this->commercialName = $commercialName;

        return $this;
    }

    public function getReturnTypeChoice(): ?string
    {
        return $this->returnTypeChoice;
    }

    public function setReturnTypeChoice(?string $returnTypeChoice): Service
    {
        $this->returnTypeChoice = $returnTypeChoice;

        return $this;
    }

    public function toArray(): array
    {
        $service = [
            'productCode' => $this->getProductCode(),
            'depositDate' => $this->getDepositDate(),
        ];

        if ($transportationAmont = $this->getTransportationAmont()) {
            $service['transportationAmont'] = $transportationAmont;
        }

        if ($totalAmount = $this->getTotalAmount()) {
            $service['totalAmount'] = $totalAmount;
        }

        $service['orderNumber'] = $this->getOrderNumber();
        $service['commercialName'] = $this->getCommercialName();

        if ($returnTypeChoice = $this->getReturnTypeChoice()) {
            $service['returnTypeChoice'] = $returnTypeChoice;
        }

        return $service;
    }
}
