<?php

namespace Spec\FreshMail\Api;

use FreshMail\Client;
use FreshMail\HttpClient;
use FreshMail\Response\Response;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class SubscribersListSpec
 * @package Spec\FreshMail\Api
 */
class SubscribersListSpec extends ObjectBehavior
{
    const API_KEY = 'test_api_key';
    const API_SECRET_KEY = 'test_api_secret_key';

    function let(Client $client)
    {
        $client->getApiKey()->willReturn(self::API_KEY);
        $client->getSecretApiKey()->willReturn(self::API_SECRET_KEY);

        $this->beConstructedWith($client);
    }

    function it_should_create_new_subscribers_list(Client $client, HttpClient $httpClient)
    {
        $this->buildDefaultClient($client, $httpClient);

        $this->create([])->shouldReturnAnInstanceOf(Response::class);
    }

    function it_should_update_subscribers_list(Client $client, HttpClient $httpClient)
    {
        $this->buildDefaultClient($client, $httpClient);

        $this->update([])->shouldReturnAnInstanceOf(Response::class);
    }

    function it_should_delete_subscribers_list(Client $client, HttpClient $httpClient)
    {
        $this->buildDefaultClient($client, $httpClient);

        $this->delete([])->shouldReturnAnInstanceOf(Response::class);
    }

    function it_should_get_subscribers_lists(Client $client, HttpClient $httpClient)
    {
        $this->buildDefaultClient($client, $httpClient);

        $this->create([])->shouldReturnAnInstanceOf(Response::class);
    }

    /**
     * @param Client $client
     * @param HttpClient $httpClient
     */
    private function buildDefaultClient(Client $client, HttpClient $httpClient)
    {
        $client->addHeaders(Argument::type('array'))->shouldBeCalled();
        $client->getHeaders()->shouldBeCalled();
        $client->getHttpClient()->willReturn($httpClient);

        $httpClient->post(Argument::type('string'), Argument::type('array'), Argument::type('array'))->shouldBeCalled();
    }
}
