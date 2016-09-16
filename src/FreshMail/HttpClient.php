<?php declare(strict_types=1);

namespace FreshMail;

use FreshMail\Response\Response;

/**
 * Class HttpClient
 * @package FreshMail
 */
interface HttpClient
{
    /**
     * @param string $path
     * @param array $parameters
     * @param array $headers
     *
     * @return Response
     */
    public function post(string $path, array $parameters, array $headers) : Response;

    /**
     * @param string $path
     * @param array $parameters
     * @param array $headers
     *
     * @return Response
     */
    public function get(string $path, array $parameters, array $headers) : Response;
}
