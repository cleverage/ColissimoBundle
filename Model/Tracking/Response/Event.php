<?php

namespace CleverAge\ColissimoBundle\Model\Tracking\Response;

use CleverAge\ColissimoBundle\Model\BaseResponseModel;

class Event extends BaseResponseModel
{
    private ?string $date = null;
    private string $code;
    private ?string $labelLong = null;
    private ?string $siteName = null;
    private ?string $siteZipCode = null;

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): Event
    {
        $this->date = $date;

        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): Event
    {
        $this->code = $code;

        return $this;
    }

    public function getLabelLong(): ?string
    {
        return $this->labelLong;
    }

    public function setLabelLong(?string $labelLong): Event
    {
        $this->labelLong = $labelLong;

        return $this;
    }

    public function getSiteName(): ?string
    {
        return $this->siteName;
    }

    public function setSiteName(?string $siteName): Event
    {
        $this->siteName = $siteName;

        return $this;
    }

    public function getSiteZipCode(): ?string
    {
        return $this->siteZipCode;
    }

    public function setSiteZipCode(?string $siteZipCode): Event
    {
        $this->siteZipCode = $siteZipCode;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'date' => $this->getDate(),
            'code' => $this->getCode(),
            'labelLong' => $this->getLabelLong(),
            'siteName' => $this->getSiteName(),
            'siteZipCode' => $this->getSiteZipCode(),
        ];
    }
}
