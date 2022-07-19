<?php

namespace CleverAge\ColissimoBundle\Model\Shipping\Letter;

class Sender extends BaseAddress
{
    private string $companyName;

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): Sender
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function toArray(): array
    {
        return array_merge([
            'companyName' => $this->getCompanyName(),
        ], parent::toArray());
    }
}
