<?php

namespace CleverAge\ColissimoBundle\Model\Shipping;

class OutputFormat
{
    private int $x = 0;
    private int $y = 0;
    private string $outputPrintingType;

    public function getX(): int
    {
        return $this->x;
    }

    public function setX(int $x): OutputFormat
    {
        $this->x = $x;

        return $this;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function setY(int $y): OutputFormat
    {
        $this->y = $y;

        return $this;
    }

    public function getOutputPrintingType(): string
    {
        return $this->outputPrintingType;
    }

    public function setOutputPrintingType(string $outputPrintingType): OutputFormat
    {
        $this->outputPrintingType = $outputPrintingType;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'x' => $this->getX(),
            'y' => $this->getY(),
            'outputPrintingType' => $this->getOutputPrintingType(),
        ];
    }
}
