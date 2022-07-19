<?php

namespace CleverAge\ColissimoBundle\Model\Shipping;

use CleverAge\ColissimoBundle\Model\Shipping\Letter\Addressee;
use CleverAge\ColissimoBundle\Model\Shipping\Letter\CustomsDeclarations;
use CleverAge\ColissimoBundle\Model\Shipping\Letter\Parcel;
use CleverAge\ColissimoBundle\Model\Shipping\Letter\Sender;
use CleverAge\ColissimoBundle\Model\Shipping\Letter\Service;

class Letter
{
    private Service $service;
    private Parcel $parcel;
    private ?CustomsDeclarations $customsDeclarations = null;
    private ?Sender $sender = null;
    private Addressee $addressee;

    public function getService(): Service
    {
        return $this->service;
    }

    public function setService(Service $service): Letter
    {
        $this->service = $service;

        return $this;
    }

    public function getParcel(): Parcel
    {
        return $this->parcel;
    }

    public function setParcel(Parcel $parcel): Letter
    {
        $this->parcel = $parcel;

        return $this;
    }

    public function getCustomsDeclarations(): ?CustomsDeclarations
    {
        return $this->customsDeclarations;
    }

    public function setCustomsDeclarations(?CustomsDeclarations $customsDeclarations): Letter
    {
        $this->customsDeclarations = $customsDeclarations;

        return $this;
    }

    public function getSender(): ?Sender
    {
        return $this->sender;
    }

    public function setSender(?Sender $sender): Letter
    {
        $this->sender = $sender;

        return $this;
    }

    public function getAddressee(): Addressee
    {
        return $this->addressee;
    }

    public function setAddressee(Addressee $addressee): Letter
    {
        $this->addressee = $addressee;

        return $this;
    }

    public function toArray(): array
    {
        $letter =  [
            'service' => $this->getService()->toArray(),
            'parcel' => $this->getParcel()->toArray(),
        ];

        if ($customDeclarations = $this->getCustomsDeclarations()) {
            $letter['customDeclarations'] = $customDeclarations->toArray();
        }

        if ($sender = $this->getSender()) {
            $letter['sender'] = ['address' => $sender->toArray()];
        }

        $letter['addressee'] = ['address' => $this->getAddressee()->toArray()];

        return $letter;
    }
}
