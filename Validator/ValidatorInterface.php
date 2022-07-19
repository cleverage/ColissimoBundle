<?php

namespace CleverAge\ColissimoBundle\Validator;

interface ValidatorInterface
{
    /**
     * Validate the data passed in parameter mapped to paramsToValidate.
     */
    public function validate($data, array $paramsToValidate): array;
}
