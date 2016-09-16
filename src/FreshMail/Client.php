<?php declare(strict_types=1);

namespace FreshMail;

use FreshMail\Api\Api;
use FreshMail\Api\Campaign;
use FreshMail\Api\Ping;
use FreshMail\Api\Subscriber;
use FreshMail\Api\SubscribersList;

/**
 * Class Client
 * @package FreshMail
 */
class Client
{
    const API_URL = "https://api.freshmail.com/rest/";

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $secretApiKey;

    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @var array
     */
    private $headers;

    /**
     * @param string $apiKey
     * @param string $secretApiKey
     * @param HttpClient $httpClient
     */
    public function __construct(string $apiKey, string $secretApiKey, HttpClient $httpClient)
    {
        $this->apiKey = $apiKey;
        $this->secretApiKey = $secretApiKey;
        $this->httpClient = $httpClient;

        $this->headers = [
            'X-Rest-ApiKey' => $apiKey
        ];
    }

    /**
     * @param string $name
     * @return Api
     * @throws \Exception
     */
    public function api(string $name) : Api
    {
        switch ($name) {
            case 'subscriber':
                return new Subscriber($this);
            case 'subscribers_list':
                return new SubscribersList($this);
            case 'campaign':
                return new Campaign($this);
            case 'ping':
                return new Ping($this);
            default:
                throw new \Exception(sprintf('Undefined api instance called: "%s"', $name));
        }
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getSecretApiKey(): string
    {
        return $this->secretApiKey;
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient() : HttpClient
    {
        return $this->httpClient;
    }

    /**
     * @param array $headers
     */
    public function addHeaders(array $headers)
    {
        foreach ($headers as $key => $header) {
            $this->headers[$key] = $header;
        }
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }
}
