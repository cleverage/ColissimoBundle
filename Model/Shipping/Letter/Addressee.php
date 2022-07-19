<?php

namespace CleverAge\ColissimoBundle\Model\Shipping\Letter;

class Addressee extends BaseAddress
{
    private string $lastName;
    private string $firstName;
    private ?string $mobileNumber = null;
    private ?string $email = null;

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): Addressee
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): Addressee
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getMobileNumber(): ?string
    {
        return $this->mobileNumber;
    }

    public function setMobileNumber(?string $mobileNumber): Addressee
    {
        $this->mobileNumber = $mobileNumber;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): Addressee
    {
        $this->email = $email;

        return $this;
    }

    public function toArray(): array
    {
        $base = [
            'lastName' => $this->getLastName(),
            'firstName' => $this->getFirstName(),
        ];

        if ($mobileNumber = $this->getMobileNumber()) {
            $base['mobileNumber'] = $mobileNumber;
        }

        if ($email = $this->getEmail()) {
            $base['email'] = $email;
        }

        return array_merge($base, parent::toArray());
    }
}
