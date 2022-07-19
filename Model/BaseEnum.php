<?php

namespace CleverAge\ColissimoBundle\Model;

use http\Exception\InvalidArgumentException;

abstract class BaseEnum
{
    public const ALL = [];

    public static function denormalize($data): string
    {
        if (!isset(static::ALL[$data])) {
            throw new InvalidArgumentException("Unexpected data '$data'.");
        }

        return static::ALL[$data];
    }
}
