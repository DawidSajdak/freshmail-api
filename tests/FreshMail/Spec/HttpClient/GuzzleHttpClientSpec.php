<?php

namespace Spec\FreshMail\HttpClient;

use FreshMail\Response\Response;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use PhpSpec\ObjectBehavior;
use Psr\Http\Message\StreamInterface;

/**
 * Class GuzzleHttpClientSpec
 * @package Spec\FreshMail\HttpClient
 */
class GuzzleHttpClientSpec extends ObjectBehavior
{
    function let(Client $client)
    {
        $this->beConstructedWith($client);
    }

    function it_should_send_post_request(Client $client, Request $request, StreamInterface $stream)
    {
        $request->getBody()->willReturn($stream);
        $stream->getContents()->willReturn('{"status":"OK", "data":{ "id": 1}}');

        $client->request(
            'POST',
            'http://localhost',
            [
                'headers' => [],
                'form_params' => []
            ]
        )->shouldBeCalled()->willReturn($request);

        $this->post('http://localhost', [], [])->shouldReturnAnInstanceOf(Response::class);;
    }
}
