<?php

namespace CleverAge\ColissimoBundle\Service;

use CleverAge\ColissimoBundle\Exception\MissingPickupPointsSearchArgument;
use CleverAge\ColissimoBundle\Exception\PickupPointsRequestException;
use CleverAge\ColissimoBundle\Model\PickupPoint\PickupErrorsCodes;
use CleverAge\ColissimoBundle\Model\PickupPoint\PickupPoint;
use CleverAge\ColissimoBundle\Model\PickupPoint\PickupPointsSearchModel;
use Symfony\Component\HttpFoundation\Request;

class PickupPointsService extends AbstractService
{
    private const URL = '/pointretrait-ws-cxf/PointRetraitServiceWS/2.0/findRDVPointRetraitAcheminement';
    private const DATA = [
        'city', 'zipCode', 'countryCode', 'shippingDate',
    ];

    /**
     * @return array<PickupPoint>
     */
    public function call(
        PickupPointsSearchModel $pickupPointsSearchModel,
        array $options = [],
        array $customCredentials = []
    ): array {
        return $this->doCall(Request::METHOD_GET, self::URL, array_merge([
            'city' => $pickupPointsSearchModel->getCity(),
            'zipCode' => $pickupPointsSearchModel->getZipCode(),
            'countryCode' => $pickupPointsSearchModel->getCountryCode(),
            'shippingDate' => $pickupPointsSearchModel->getShippingDate(),
        ], $options), $customCredentials);
    }

    public function validateDataBeforeCall(array $dataToValidate): void
    {
        $validate = $this->validator->validate($dataToValidate, self::DATA);
        if (!$validate['validate']) {
            $param = $validate['exceptionParam'];
            $getter = '$pickupPointsSearchModel->get' . ucfirst($param) . '()';

            throw new MissingPickupPointsSearchArgument("Missing $getter value. Please set $param to model.");
        }
    }

    /**
     * @return array<PickupPoint>
     */
    public function parseResponse($response): array
    {
        $pickupPoint = [];
        foreach ($response->xpath('//listePointRetraitAcheminement') as $item) {
            $pickupPoint[] = new PickupPoint($item);
        }

        return $pickupPoint;
    }

    public function parseErrorCodeAndThrow(int $errorCode): void
    {
        throw new PickupPointsRequestException(PickupErrorsCodes::ERRORS[$errorCode]);
    }
}
