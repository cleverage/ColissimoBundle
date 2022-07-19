<?php

namespace CleverAge\ColissimoBundle\Model\Inter;

use CleverAge\ColissimoBundle\Model\BaseResponseModel;

class ProductInterResponse extends BaseResponseModel
{
    private array $product;
    private array $returnChoiceType;

    public function getProduct(): array
    {
        return $this->product;
    }

    public function setProduct(array $product): ProductInterResponse
    {
        $this->product = $product;

        return $this;
    }

    public function getReturnChoiceType(): array
    {
        return $this->returnChoiceType;
    }

    public function setReturnChoiceType(array $returnChoiceType): ProductInterResponse
    {
        $this->returnChoiceType = $returnChoiceType;

        return $this;
    }
}
