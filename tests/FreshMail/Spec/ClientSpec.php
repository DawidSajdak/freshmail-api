<?php

namespace Spec\FreshMail;

use FreshMail\Api\Campaign;
use FreshMail\Api\Ping;
use FreshMail\Api\Subscriber;
use FreshMail\HttpClient;
use PhpSpec\ObjectBehavior;

/**
 * Class ClientSpec
 * @package Spec\FreshMail
 */
class ClientSpec extends ObjectBehavior
{
    const API_KEY = 'test_api_key';
    const API_SECRET_KEY = 'test_api_secret_key';

    function let(HttpClient $httpClient)
    {
        $this->beConstructedWith(
            self::API_KEY,
            self::API_SECRET_KEY,
            $httpClient
        );
    }

    function it_has_a_api_key()
    {
        $this->getApiKey()->shouldBe(self::API_KEY);
    }

    function it_has_a_secret_api_key()
    {
        $this->getSecretApiKey()->shouldBe(self::API_SECRET_KEY);
    }

    function it_should_has_a_http_client()
    {
        $this->getHttpClient()->shouldBeAnInstanceOf(HttpClient::class);
    }

    function it_has_headers()
    {
        $this->getHeaders()->shouldBeArray();
        $this->getHeaders()->shouldHaveKeyWithValue('X-Rest-ApiKey', self::API_KEY);
    }

    function it_should_adds_new_headers()
    {
        $this->addHeaders(['test-key' => 'test-value']);
        $this->getHeaders()->shouldHaveKeyWithValue('test-key', 'test-value');
    }

    function it_should_has_correct_instance()
    {
        $this->api('ping')->shouldBeAnInstanceOf(Ping::class);
        $this->api('campaign')->shouldBeAnInstanceOf(Campaign::class);
        $this->api('subscriber')->shouldBeAnInstanceOf(Subscriber::class);
    }

    function it_should_throw_exception_when_api_instance_is_invalid()
    {
        $this->shouldThrow(new \Exception('Undefined api instance called: "test"'))->during('api', ['test']);
    }
}
