<?php

namespace CleverAge\ColissimoBundle\Service;

use CleverAge\ColissimoBundle\Exception\MissingPickupPointSearchByIdArgument;
use CleverAge\ColissimoBundle\Exception\PickupPointsRequestException;
use CleverAge\ColissimoBundle\Model\PickupPoint\PickupErrorsCodes;
use CleverAge\ColissimoBundle\Model\PickupPoint\PickupPoint;
use CleverAge\ColissimoBundle\Model\PickupPoint\PickupPointSearchByIdModel;
use Symfony\Component\HttpFoundation\Request;

class PickupPointByIdService extends AbstractService
{
    private const URL = '/pointretrait-ws-cxf/PointRetraitServiceWS/2.0/findPointRetraitAcheminementByID';
    private const DATA = ['id', 'date'];

    public function call(
        PickupPointSearchByIdModel $pickupPointByIdSearchModel,
        array $options = [],
        array $customCredentials = []
    ): ?PickupPoint {
        return $this->doCall(Request::METHOD_GET, self::URL, array_merge([
            'id' => $pickupPointByIdSearchModel->getId(),
            'date' => $pickupPointByIdSearchModel->getShippingDate(),
        ], $options), $customCredentials);
    }

    public function validateDataBeforeCall(array $dataToValidate): void
    {
        $validate = $this->validator->validate($dataToValidate, self::DATA);
        if (!$validate['validate']) {
            $param = $validate['exceptionParam'];
            $getter = $param === 'date' ? '$pickupPointByIdSearchModel->getShippingDate()' : '$pickupPointByIdSearchModel->getId()';

            throw new MissingPickupPointSearchByIdArgument("Missing $getter value. Please set $param to model.");
        }
    }

    public function parseResponse($response): ?PickupPoint
    {
        $pickupPoint = $response->xpath('//pointRetraitAcheminement');
        if (count($pickupPoint) && array_key_exists(0, $pickupPoint)) {
            return new PickupPoint($pickupPoint[0]);
        }

        return null;
    }

    public function parseErrorCodeAndThrow(int $errorCode): void
    {
        throw new PickupPointsRequestException(PickupErrorsCodes::ERRORS[$errorCode]);
    }
}
