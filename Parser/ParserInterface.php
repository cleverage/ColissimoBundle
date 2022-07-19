<?php

namespace CleverAge\ColissimoBundle\Parser;

interface ParserInterface
{
    /**
     * Parse the response given in parameters.
     */
    public function parse(string $response): array;
}
