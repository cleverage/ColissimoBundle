<?php

namespace CleverAge\ColissimoBundle\Service;

use CleverAge\ColissimoBundle\Exception\MissingTrackingSearchArgument;
use CleverAge\ColissimoBundle\Exception\TrackingRequestException;
use CleverAge\ColissimoBundle\Model\Tracking\Response\ParcelResponse;
use CleverAge\ColissimoBundle\Model\Tracking\Response\TrackingResponse;
use CleverAge\ColissimoBundle\Model\Tracking\TrackingSearchModel;
use Symfony\Component\HttpFoundation\Request;

class TrackingService extends AbstractService
{
    private const URL = '/tracking-timeline-ws/rest/tracking/timelineCompany';
    private const DATA = [
        'parcelNumber', 'lang',
    ];

    public function call(
        TrackingSearchModel $trackingSearchModel,
        array $customCredentials = []
    ): TrackingResponse {
        $credentials = [] !== $customCredentials
            ? ['login' => $customCredentials['contractNumber'], 'password' => $customCredentials['password']]
            : ['login' => $this->credentials['contractNumber'], 'password' => $this->credentials['password']];

        return $this->doCall(Request::METHOD_POST, self::URL, [
            'parcelNumber' => $trackingSearchModel->getParcelNumber(),
            'lang' => $trackingSearchModel->getLang(),
        ], $credentials);
    }

    public function validateDataBeforeCall(array $dataToValidate): void
    {
        $validate = $this->validator->validate($dataToValidate, self::DATA);
        if (!$validate['validate']) {
            $param = $validate['exceptionParam'];
            $getter = '$trackingSearchModel->get' . ucfirst($param) . '()';

            throw new MissingTrackingSearchArgument("Missing $getter value. Please set $param to model.");
        }
    }

    /**
     * @throws TrackingRequestException
     */
    public function parseResponse($response): TrackingResponse
    {
        $responses = $this->slsResponseParser->parse($response);

        $body = $responses[0]['body'];
        $status = $body['status'][0];
        if ($status['code'] !== "0") {
            throw new TrackingRequestException($status['message'], $status['code']);
        }

        $parcel = $body['parcel'];

        $trackingResponse = new TrackingResponse();
        $trackingResponse->setLang($body['lang'])
            ->setParcel((new ParcelResponse())->populate($parcel));

        $trackingResponse->getParcel()->setDeliveryChoice($parcel['service']['deliveryChoice']);

        return $trackingResponse;
    }

    public function parseErrorCodeAndThrow(int $errorCode): void
    {
    }
}
