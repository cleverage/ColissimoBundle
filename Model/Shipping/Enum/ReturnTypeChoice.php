<?php

namespace CleverAge\ColissimoBundle\Model\Shipping\Enum;

use CleverAge\ColissimoBundle\Model\BaseEnum;

class ReturnTypeChoice extends BaseEnum
{
    public const RETURN_TO_SENDER = '2';
    public const DO_NOT_RETURN = '3';

    public const ALL = [
        '2' => 'RETURN_TO_SENDER',
        '3' => 'DO_NOT_RETURN',
    ];
}
