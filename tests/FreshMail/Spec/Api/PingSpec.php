<?php

namespace Spec\FreshMail\Api;

use FreshMail\Client;
use FreshMail\HttpClient;
use FreshMail\Response\Response;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class PingSpec
 * @package Spec\FreshMail\Api
 */
class PingSpec extends ObjectBehavior
{
    const API_KEY = 'test_api_key';
    const API_SECRET_KEY = 'test_api_secret_key';

    function let(Client $client)
    {
        $client->getApiKey()->willReturn(self::API_KEY);
        $client->getSecretApiKey()->willReturn(self::API_SECRET_KEY);

        $this->beConstructedWith($client);
    }

    function it_should_ping_to_api(Client $client, HttpClient $httpClient)
    {
        $client->addHeaders(Argument::type('array'))->shouldBeCalled();
        $client->getHeaders()->shouldBeCalled();
        $client->getHttpClient()->willReturn($httpClient);

        $httpClient->post(Argument::type('string'), Argument::type('array'), Argument::type('array'))->shouldBeCalled();

        $this->ping([])->shouldReturnAnInstanceOf(Response::class);
    }
}
