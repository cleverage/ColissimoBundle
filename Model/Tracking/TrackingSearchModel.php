<?php

namespace CleverAge\ColissimoBundle\Model\Tracking;

class TrackingSearchModel
{
    private string $parcelNumber;
    private string $lang = 'fr_FR';

    public function getParcelNumber(): string
    {
        return $this->parcelNumber;
    }

    public function setParcelNumber(string $parcelNumber): TrackingSearchModel
    {
        $this->parcelNumber = $parcelNumber;

        return $this;
    }

    public function getLang(): string
    {
        return $this->lang;
    }

    public function setLang(string $lang): TrackingSearchModel
    {
        $this->lang = $lang;

        return $this;
    }
}
