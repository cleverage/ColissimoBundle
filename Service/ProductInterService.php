<?php

namespace CleverAge\ColissimoBundle\Service;

use CleverAge\ColissimoBundle\Exception\MissingProductInterSearchArgument;
use CleverAge\ColissimoBundle\Exception\ProductInterRequestException;
use CleverAge\ColissimoBundle\Model\Inter\ProductInter;
use CleverAge\ColissimoBundle\Model\Inter\ProductInterResponse;
use Symfony\Component\HttpFoundation\Request;

class ProductInterService extends AbstractService
{
    private const URL = '/sls-ws/SlsServiceWSRest/2.0/getProductInter';
    private const DATA = [
        'productCode', 'countryCode', 'zipCode',
    ];

    public function call(ProductInter $productInter, array $customCredentials = []): ProductInterResponse
    {
        return $this->doCall(Request::METHOD_POST, self::URL, $productInter->toArray(), $customCredentials);
    }

    public function validateDataBeforeCall(array $dataToValidate): void
    {
        $validate = $this->validator->validate($dataToValidate, self::DATA);
        if (!$validate['validate']) {
            $param = $validate['exceptionParam'];
            $getter = '$productInter->get' . ucfirst($param) . '()';

            throw new MissingProductInterSearchArgument("Missing $getter value. Please set $param to model.");
        }
    }

    public function parseResponse($response): ProductInterResponse
    {
        $responses = $this->slsResponseParser->parse($response);

        $body = $responses[0]['body'];
        if ([] === $body['product'] && [] === $body['returnTypeChoice']) {
            $errors = [];
            foreach ($body['messages'] as $message) {
                $errors[] = $message['messageContent'] . ', ';
            }

            throw new ProductInterRequestException(implode('', $errors));
        }

        return (new ProductInterResponse())->populate($body);
    }

    public function parseErrorCodeAndThrow(int $errorCode): void
    {
    }
}
