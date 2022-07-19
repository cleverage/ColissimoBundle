<?php

namespace CleverAge\ColissimoBundle\Model\Tracking\Response;

use CleverAge\ColissimoBundle\Model\BaseResponseModel;

class ParcelResponse extends BaseResponseModel
{
    private string $parcelNumber;
    private ?string $parcelNumberAVPI = null;
    private ?string $parcelNumberInstance = null;
    private ?string $contractNumber = null;
    private ?RemovalPoint $removalPoint = null;
    private bool $deliveryChoice = false;
    /** @var array<Event> */
    private array $events;
    /** @var array<Step> */
    private array $steps;

    public function getParcelNumber(): string
    {
        return $this->parcelNumber;
    }

    public function setParcelNumber(string $parcelNumber): ParcelResponse
    {
        $this->parcelNumber = $parcelNumber;

        return $this;
    }

    public function getParcelNumberAVPI(): ?string
    {
        return $this->parcelNumberAVPI;
    }

    public function setParcelNumberAVPI(?string $parcelNumberAVPI): ParcelResponse
    {
        $this->parcelNumberAVPI = $parcelNumberAVPI;

        return $this;
    }

    public function getParcelNumberInstance(): ?string
    {
        return $this->parcelNumberInstance;
    }

    public function setParcelNumberInstance(?string $parcelNumberInstance): ParcelResponse
    {
        $this->parcelNumberInstance = $parcelNumberInstance;

        return $this;
    }

    public function getContractNumber(): ?string
    {
        return $this->contractNumber;
    }

    public function setContractNumber(?string $contractNumber): ParcelResponse
    {
        $this->contractNumber = $contractNumber;

        return $this;
    }

    public function getRemovalPoint(): ?RemovalPoint
    {
        return $this->removalPoint;
    }

    public function setRemovalPoint(array $removalPoint): ParcelResponse
    {
        $this->removalPoint = (new RemovalPoint())->populate($removalPoint);

        return $this;
    }

    public function isDeliveryChoice(): bool
    {
        return $this->deliveryChoice;
    }

    public function setDeliveryChoice(bool $deliveryChoice): ParcelResponse
    {
        $this->deliveryChoice = $deliveryChoice;

        return $this;
    }

    public function getEvents(): array
    {
        return $this->events;
    }

    public function setEvent(array $events): ParcelResponse
    {
        $this->events[] = (new Event())->populate($events);

        return $this;
    }

    public function getSteps(): array
    {
        return $this->steps;
    }

    public function setStep(array $steps): ParcelResponse
    {
        $this->steps[] = (new Step())->populate($steps);

        return $this;
    }
}
