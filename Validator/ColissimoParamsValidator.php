<?php

namespace CleverAge\ColissimoBundle\Validator;

class ColissimoParamsValidator implements ValidatorInterface
{
    private const GETTER_PREFIX = 'get';

    public function validate($data, array $paramsToValidate): array
    {
        foreach ($paramsToValidate as $param) {
            if (is_array($data)) {
                if (!array_key_exists($param, $data) || '' === $data[$param] || null === $data[$param]) {
                    return [
                        'validate' => false,
                        'exceptionParam' => $param,
                    ];
                }
            } elseif (is_object($data)) {
                $getter = self::GETTER_PREFIX . ucfirst($param);
                if (method_exists($data, $getter)) {
                    $value = $data->$getter();
                    if ('' === $value || null === $value) {
                        return [
                            'validate' => false,
                            'exceptionParam' => $param,
                        ];
                    }
                }
            }
        }

        return [
            'validate' => true,
            'exceptionParam' => '',
        ];
    }
}
