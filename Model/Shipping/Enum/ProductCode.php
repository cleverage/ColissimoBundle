<?php

namespace CleverAge\ColissimoBundle\Model\Shipping\Enum;

use CleverAge\ColissimoBundle\Model\BaseEnum;

class ProductCode extends BaseEnum
{
    // FRANCE
    const DOM  = 'DOM';
    const COLD = 'COLD';
    const DOS  = 'DOS';
    const COL  = 'COL';
    const BPR  = 'BPR';
    const A2P  = 'A2P';
    const CORE = 'CORE';
    const COLR = 'COLR';
    const JP1  = 'J+1';

    // International
    const CORI = 'CORI';
    const COM  = 'COM';
    const CDS  = 'CDS';
    const ECO  = 'ECO';
    const ACP  = 'ACP';
    const COLI = 'COLI';
    const ACCI = 'ACCI';
    const CMT  = 'CMT';
    const PCS  = 'PCS';
    const BDP  = 'BDP';
    const CDI  = 'CDI';
    const BOS  = 'BOS';
    const BOM  = 'BOM';
    
    // Hors domicile (Fr & International)
    const HD  = 'HD';

    public const ALL = [
        '6A'  => self::DOM,
        '9L'  => self::COLD,
        '6C'  => self::DOS,
        '9V'  => self::COL,
        '6H'  => self::BPR,
        '6M'  => self::A2P,
        '8R'  => self::CORE,
        '6G'  => self::COLR,
        '6V'  => self::JP1,
        '7R'  => self::CORI,
        '8Q'  => self::COM,
        '7Q'  => self::CDS,
        '9W'  => self::ECO,
        '5R'  => self::CORI,
        'CP'  => self::COLI,
        'EY'  => self::COLI,
        'EN'  => self::ACCI,
        'CM'  => self::CMT,
        'CG'  => 'PCG',
        'CA'  => self::DOM,
        'CB'  => self::DOS,
        'BDP' => 'CI',
        '6M' => self::HD,
        '9M' => self::HD,
        'CM' => self::HD,
        'CG' => self::HD,
        'CI' => self::HD
    ];
}
