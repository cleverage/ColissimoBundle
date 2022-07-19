<?php

namespace CleverAge\ColissimoBundle\Service;

use CleverAge\ColissimoBundle\Exception\ShippingRequestException;
use CleverAge\ColissimoBundle\Model\Shipping\Label;
use CleverAge\ColissimoBundle\Model\Shipping\Letter\Sender;
use CleverAge\ColissimoBundle\Model\Shipping\Response\LabelResponse;
use Symfony\Component\HttpFoundation\Request;

class ShippingService extends AbstractService
{
    private const URL = '/sls-ws/SlsServiceWSRest/2.0/generateLabel';

    public function call(Label $label, array $customCredentials = []): LabelResponse
    {
        $letter = $label->getLetter();
        if (null === $letter->getSender()) {
            $this->manageSender($label);
        }

        $service = $letter->getService();
        if (null === $service->getCommercialName()) {
            $service->setCommercialName($this->service['commercialName'] ?? '');
        }

        return $this->doCall(Request::METHOD_POST, self::URL, $label->toArray(), $customCredentials);
    }

    private function manageSender(Label $label): void
    {
        $sender = (new Sender())
            ->setCompanyName($this->sender['companyName'] ?? '')
            ->setLine0($this->sender['line0'] ?? '')->setLine1($this->sender['line1'] ?? '')
            ->setLine2($this->sender['line2'] ?? '')->setLine3($this->sender['line3'] ?? '')
            ->setCountryCode($this->sender['countryCode'] ?? '')
            ->setZipCode($this->sender['zipCode'] ?? '')
            ->setCity($this->sender['city'] ?? '');

        $label->getLetter()->setSender($sender);
    }

    public function parseResponse($response): LabelResponse
    {
        $responses = $this->slsResponseParser->parse($response);

        $labelV2Response = $responses[0]['body']['labelV2Response'];
        if (null === $labelV2Response) {
            $errors = [];
            foreach ($responses[0]['body']['messages'] as $message) {
                $errors[] = $message['messageContent'] . ', ';
            }

            throw new ShippingRequestException(implode('', $errors));
        }

        return (new LabelResponse())->populate($labelV2Response);
    }

    public function validateDataBeforeCall(array $dataToValidate): void
    {
    }

    public function parseErrorCodeAndThrow(int $errorCode): void
    {
    }
}
