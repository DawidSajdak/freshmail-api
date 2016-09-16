<?php

namespace FreshMail\Api;

use FreshMail\Client;
use FreshMail\Response\Response;

/**
 * Class Api
 * @package FreshMail\Api
 */
abstract class Api
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $path
     * @param array $parameters
     *
     * @return Response
     */
    protected function post(string $path, array $parameters) : Response
    {
        $headers = $this->prepareHeaders($path, $parameters);
        return $this->client->getHttpClient()->post(Client::API_URL . $path, $parameters, $headers);
    }

    /**
     * @param string $path
     * @param array $parameters
     *
     * @return Response
     */
    protected function get(string $path, array $parameters) : Response
    {
        $headers = $this->prepareHeaders($path, $parameters);
        return $this->client->getHttpClient()->get(Client::API_URL . $path, $parameters, $headers);
    }

    /**
     * @param string $path
     * @param array $parameters
     *
     * @return array
     */
    private function prepareHeaders(string $path, array $parameters) : array
    {
        if (empty($parameters)) {
            $parameters = '';
        } else {
            $parameters = http_build_query($parameters);
        }

        $sign = sha1($this->client->getApiKey() . '/rest/' . $path . $parameters . $this->client->getSecretApiKey());
        $this->client->addHeaders(
            [
                'X-Rest-ApiSign' => $sign
            ]
        );

        return $this->client->getHeaders();
    }
}
