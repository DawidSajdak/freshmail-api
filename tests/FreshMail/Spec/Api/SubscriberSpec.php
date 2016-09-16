<?php

namespace Spec\FreshMail\Api;

use FreshMail\Client;
use FreshMail\HttpClient;
use FreshMail\Response\Response;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class SubscriberSpec
 * @package Spec\FreshMail\Api
 */
class SubscriberSpec extends ObjectBehavior
{
    const API_KEY = 'test_api_key';
    const API_SECRET_KEY = 'test_api_secret_key';

    function let(Client $client)
    {
        $client->getApiKey()->willReturn(self::API_KEY);
        $client->getSecretApiKey()->willReturn(self::API_SECRET_KEY);

        $this->beConstructedWith($client);
    }

    function it_should_add_new_subscriber(Client $client, HttpClient $httpClient)
    {
        $this->buildDefaultClient($client, $httpClient);

        $this->add([])->shouldReturnAnInstanceOf(Response::class);
    }

    function it_should_edit_subscriber(Client $client, HttpClient $httpClient)
    {
        $this->buildDefaultClient($client, $httpClient);

        $this->edit([])->shouldReturnAnInstanceOf(Response::class);
    }

    function it_should_delete_subscriber(Client $client, HttpClient $httpClient)
    {
        $this->buildDefaultClient($client, $httpClient);

        $this->delete([])->shouldReturnAnInstanceOf(Response::class);
    }

    function it_should_get_subscriber_history(Client $client, HttpClient $httpClient)
    {
        $this->buildDefaultClient($client, $httpClient);

        $this->getHistory([])->shouldReturnAnInstanceOf(Response::class);
    }

    function it_should_add_multiple_subscribers(Client $client, HttpClient $httpClient)
    {
        $this->buildDefaultClient($client, $httpClient);

        $this->addMultiple([])->shouldReturnAnInstanceOf(Response::class);
    }

    function it_should_edit_multiple_subscribers(Client $client, HttpClient $httpClient)
    {
        $this->buildDefaultClient($client, $httpClient);

        $this->editMultiple([])->shouldReturnAnInstanceOf(Response::class);
    }

    function it_should_delete_multiple_subscribers(Client $client, HttpClient $httpClient)
    {
        $this->buildDefaultClient($client, $httpClient);

        $this->deleteMultiple([])->shouldReturnAnInstanceOf(Response::class);
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
