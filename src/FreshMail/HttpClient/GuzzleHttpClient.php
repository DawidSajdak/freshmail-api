<?php declare(strict_types=1);

namespace FreshMail\HttpClient;

use FreshMail\HttpClient;
use FreshMail\Response\Response;
use GuzzleHttp\Client;

/**
 * Class GuzzleHttpClient
 * @package FreshMail\HttpClient
 */
class GuzzleHttpClient implements HttpClient 
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
     * @param array $headers
     *
     * @return Response
     */
    public function post(string $path, array $parameters, array $headers) : Response
    {
        $response = $this->client->request('POST', $path, ['headers' => $headers, 'form_params' => $parameters]);
        return new Response($response->getBody()->getContents());
    }

    /**
     * @param string $path
     * @param array $parameters
     * @param array $headers
     *
     * @return Response
     */
    public function get(string $path, array $parameters, array $headers) : Response
    {
        $response = $this->client->request('GET', $path, ['headers' => $headers]);
        return new Response($response->getBody()->getContents());
    }
}
