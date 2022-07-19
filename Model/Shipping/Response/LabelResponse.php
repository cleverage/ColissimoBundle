<?php

namespace CleverAge\ColissimoBundle\Model\Shipping\Response;

use CleverAge\ColissimoBundle\Model\BaseResponseModel;

class LabelResponse extends BaseResponseModel
{
    private string $parcelNumber;
    private ?string $parcelNumberPartner = null;
    private ?string $pdfUrl = null;
    private array $fields;

    public function getParcelNumber(): string
    {
        return $this->parcelNumber;
    }

    public function setParcelNumber(string $parcelNumber): LabelResponse
    {
        $this->parcelNumber = $parcelNumber;

        return $this;
    }

    public function getParcelNumberPartner(): ?string
    {
        return $this->parcelNumberPartner;
    }

    public function setParcelNumberPartner(?string $parcelNumberPartner): LabelResponse
    {
        $this->parcelNumberPartner = $parcelNumberPartner;

        return $this;
    }

    public function getPdfUrl(): ?string
    {
        return $this->pdfUrl;
    }

    public function setPdfUrl(?string $pdfUrl): LabelResponse
    {
        $this->pdfUrl = $pdfUrl;

        return $this;
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function setFields(array $fields): LabelResponse
    {
        $this->fields = $fields;

        return $this;
    }
}
