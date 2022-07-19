<?php

namespace CleverAge\ColissimoBundle\Model\Shipping\Enum;

use CleverAge\ColissimoBundle\Model\BaseEnum;

class Category extends BaseEnum
{
    public const GIFT = 1;
    public const COMMERCIAL_SAMPLE = 2;
    public const COMMERCIAL = 3;
    public const DOCUMENT = 4;
    public const OTHER = 5;
    public const RETURN = 6;

    public const ALL = [
        1 => 'GIFT',
        2 => 'COMMERCIAL_SAMPLE',
        3 => 'COMMERCIAL',
        4 => 'DOCUMENT',
        5 => 'OTHER',
        6 => 'RETURN',
    ];
}
