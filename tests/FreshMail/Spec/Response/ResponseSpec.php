<?php

namespace Spec\FreshMail\Response;

use PhpSpec\ObjectBehavior;

/**
 * Class ResponseSpec
 * @package Spec\FreshMail\Response
 */
class ResponseSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('{"status":"OK", "data":{ "id": 1}}');
    }

    function it_has_a_status()
    {
        $this->getStatus()->shouldReturn("OK");
    }

    function it_has_a_body()
    {
        $this->getBody()->shouldReturn('{"status":"OK", "data":{ "id": 1}}');
    }
}
