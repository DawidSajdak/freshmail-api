<?php declare(strict_types=1);

namespace FreshMail\Api;

use FreshMail\Response\Response;

/**
 * Class Ping
 * @package FreshMail\Api
 */
class Ping extends Api
{
    /**
     * @param array $parameters
     * @return Response
     */
    public function ping(array $parameters) : Response
    {
        return $this->post('ping', $parameters);
    }
}
