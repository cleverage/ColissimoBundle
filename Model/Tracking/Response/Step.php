<?php

namespace CleverAge\ColissimoBundle\Model\Tracking\Response;

use CleverAge\ColissimoBundle\Model\BaseResponseModel;
use CleverAge\ColissimoBundle\Model\Tracking\Enum\StepLabel;

class Step extends BaseResponseModel
{
    private int $stepId;
    private string $stepLabel;
    private string $shortLabel;
    private ?string $longLabel = null;
    private string $status;
    private ?string $country = null;
    private ?string $date = null;

    public function getStepId(): int
    {
        return $this->stepId;
    }

    public function setStepId(int $stepId): Step
    {
        $this->stepId = $stepId;
        $this->setStepLabel(StepLabel::denormalize($stepId));

        return $this;
    }

    public function getStepLabel(): string
    {
        return $this->stepLabel;
    }

    public function setStepLabel(string $stepLabel): Step
    {
        $this->stepLabel = $stepLabel;

        return $this;
    }

    public function getShortLabel(): string
    {
        return $this->shortLabel;
    }

    public function setShortLabel(string $shortLabel): Step
    {
        $this->shortLabel = $shortLabel;

        return $this;
    }

    public function getLongLabel(): ?string
    {
        return $this->longLabel;
    }

    public function setLongLabel(?string $longLabel): Step
    {
        $this->longLabel = $longLabel;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): Step
    {
        $this->status = $status;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): Step
    {
        $this->country = $country;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): Step
    {
        $this->date = $date;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getStepId(),
            'stepLabel' => $this->getStepLabel(),
            'longLabel' => $this->getLongLabel(),
            'status' => $this->getStatus(),
            'country' => $this->getCountry(),
            'date' => $this->getDate(),
        ];
    }
}
