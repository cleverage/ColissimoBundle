<?php

namespace CleverAge\ColissimoBundle\Model\PickupPoint;

interface PickupErrorsCodes
{
    public const ERRORS = [
        101 => 'Missing account number',
        102 => 'Missing password',
        104 => 'Missing postal code',
        105 => 'Missing city',
        106 => 'Missing estimated shipping date',
        107 => 'Missing pickup point ID',
        117 => 'Missing country code',
        120 => 'Weight value is not an integer',
        121 => 'Weight value is not between 1 and 99999',
        122 => 'Date format does not match DD/MM/YYYY',
        123 => 'Relay filter is not a bool',
        124 => 'Invalid pickup point ID',
        125 => 'Invalid postal code (not between 01XXX, 95XXX or 980XX)',
        127 => 'Invalid RequestId',
        129 => 'Invalid address',
        143 => 'Postal code does not match XXXX',
        201 => 'Invalid account number or password',
        144 => 'Invalid postal code',
        145 => 'Missing postal code',
        146 => 'Country not valid for Colissimo Europe',
        202 => 'Request unauthorized for this account',
        203 => 'International option not available for this country',
        300 => 'No pickup points found with rules applied',
        301 => 'No pickup points found',
        1000 => 'Internal server error',
    ];
}
