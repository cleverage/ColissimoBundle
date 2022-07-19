<?php

namespace CleverAge\ColissimoBundle\Service;

use CleverAge\ColissimoBundle\Client\ColissimoClient;
use CleverAge\ColissimoBundle\Parser\SlsResponseParser;
use CleverAge\ColissimoBundle\Validator\ColissimoParamsValidator;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

abstract class AbstractService
{
    protected ColissimoClient $colissimoClient;
    protected ColissimoParamsValidator $validator;
    protected SlsResponseParser $slsResponseParser;
    protected array $credentials;
    protected array $sender;
    protected array $service;

    public function __construct(
        ColissimoClient $colissimoClient,
        ColissimoParamsValidator $validator,
        SlsResponseParser $slsResponseParser,
        array $credentials,
        array $sender,
        array $service
    ) {
        $this->colissimoClient = $colissimoClient;
        $this->validator = $validator;
        $this->slsResponseParser = $slsResponseParser;
        $this->credentials = $credentials;
        $this->sender = $sender;
        $this->service = $service;
    }

    protected function doCall(
        string $method,
        string $url,
        array $params,
        array $customCredentials = []
    ) {
        $this->validateDataBeforeCall($params);

        $method = strtolower($method);
        if (!method_exists($this->colissimoClient, $method)) {
            throw new MethodNotAllowedException(['GET', 'POST'], 'Please provide an allowed http method.');
        }

        $response = $this->colissimoClient->$method($url, $params, $customCredentials);

        // For SlsService or tracking timeline we can not transform the response in xml element
        // because it's just a simple string.
        // So let's parse them.
        if (strpos($url, 'SlsServiceWSRest') || strpos($url, 'tracking-timeline-ws')) {
            return $this->parseResponse($response->getContent(false));
        }

        $xml = new \SimpleXMLElement($response->getContent());

        $return = $xml->xpath('//return');
        if (count($return) && (int) $return[0]->errorCode !== 0) {
            $this->parseErrorCodeAndThrow((int) $return[0]->errorCode);
        }

        return $this->parseResponse($xml);
    }

    abstract function validateDataBeforeCall(array $dataToValidate): void;

    abstract function parseErrorCodeAndThrow(int $errorCode): void;

    abstract function parseResponse($response);
}
