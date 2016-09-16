<?php declare(strict_types=1);

namespace FreshMail\Response;

/**
 * Class Response
 * @package FreshMail\Response
 */
class Response
{
    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $body;

    /**
     * @param string $responseBody
     */
    public function __construct(string $responseBody)
    {
        $this->parseResponseBody($responseBody);
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $responseBody
     */
    private function parseResponseBody(string $responseBody)
    {
        $body = json_decode($responseBody);

        $this->status = $body->status;
        $this->body = $responseBody;
    }
}
