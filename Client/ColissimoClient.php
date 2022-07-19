<?php

namespace CleverAge\ColissimoBundle\Client;

use http\Exception\InvalidArgumentException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class ColissimoClient
{
    private const PROD_BASE_URI = 'https://ws.colissimo.fr';
    private const TEST_BASE_URI = 'https://ws-check.colissimo.fr';

    private HttpClientInterface $httpClient;
    private bool $testModeEnabled;
    private array $credentials;

    public function __construct(bool $testModeEnabled, array $credentials)
    {
        $this->testModeEnabled = $testModeEnabled;
        $this->httpClient = HttpClient::createForBaseUri(
            $this->testModeEnabled ? self::TEST_BASE_URI : self::PROD_BASE_URI,
        );
        $this->credentials = $credentials;

        if (!$credentials['contractNumber'] || !$credentials['password']) {
            throw new InvalidArgumentException('Please provide contractNumber and password inside config/packages/clever_colissimo.yml');
        }
    }

    public function get(string $url, array $options = [], array $customCredentials = []): ResponseInterface
    {
        $credentials = [
            'accountNumber' => $this->credentials['contractNumber'],
            'password' => $this->credentials['password'],
        ];

        if ([] !== $customCredentials) {
            $credentials = [
                'accountNumber' => $customCredentials['contractNumber'],
                'password' => $customCredentials['password'],
            ];
        }

        return $this->httpClient->request(Request::METHOD_GET, $url, [
            'query' => array_merge($credentials, $options),
        ]);
    }

    public function post(string $url, array $options = [], array $customCredentials = []): ResponseInterface
    {
        $credentials = $this->credentials;
        if ([] !== $customCredentials) {
            $credentials = $customCredentials;
        }

        return $this->httpClient->request(Request::METHOD_POST, $url, [
            'json' => array_merge($credentials, $options),
            'headers' => [
                'contentType' => 'application/json',
            ],
        ]);
    }
}
