<?php

namespace CleverAge\ColissimoBundle\Model\Tracking\Response;

class TrackingResponse
{
    private string $lang;
    private ParcelResponse $parcelResponse;

    public function getLang(): string
    {
        return $this->lang;
    }

    public function setLang(string $lang): TrackingResponse
    {
        $this->lang = $lang;

        return $this;
    }

    public function getParcel(): ParcelResponse
    {
        return $this->parcelResponse;
    }

    public function setParcel(ParcelResponse $parcelResponse): TrackingResponse
    {
        $this->parcelResponse = $parcelResponse;

        return $this;
    }

    /**
     * @return array<Event>
     */
    public function getEvents(): array
    {
        return $this->getParcel() ? $this->getParcel()->getEvents() : [];
    }

    /**
     * @return array<Step>
     */
    public function getSteps(): array
    {
        return $this->getParcel() ? $this->getParcel()->getSteps() : [];
    }
}
