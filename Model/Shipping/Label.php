<?php

namespace CleverAge\ColissimoBundle\Model\Shipping;

class Label
{
    private OutputFormat $outputFormat;
    private Letter $letter;

    public function getOutputFormat(): OutputFormat
    {
        return $this->outputFormat;
    }

    public function setOutputFormat(OutputFormat $outputFormat): Label
    {
        $this->outputFormat = $outputFormat;

        return $this;
    }

    public function getLetter(): Letter
    {
        return $this->letter;
    }

    public function setLetter(Letter $letter): Label
    {
        $this->letter = $letter;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'outputFormat' => $this->getOutputFormat()->toArray(),
            'letter' => $this->getLetter()->toArray(),
        ];
    }
}
