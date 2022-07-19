<?php

namespace CleverAge\ColissimoBundle\Model\Tracking\Enum;

use CleverAge\ColissimoBundle\Model\BaseEnum;

class StepLabel extends BaseEnum
{
    public const ALL = [
        0 => 'Annonce',
        1 => 'Prise en charge',
        2 => 'Acheminement',
        3 => 'Arrivée sur site',
        4 => 'Livraison',
        5 => 'Livré',
    ];
}
