<?php declare(strict_types=1);

namespace FreshMail\Api;

use FreshMail\Response\Response;

/**
 * Class Campaign
 * @package FreshMail\Api
 */
class Campaign extends Api
{
    /**
     * @param array $parameters
     *
     * @return Response
     */
    public function create(array $parameters) : Response
    {
        return $this->post('campaigns/create', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return Response
     */
    public function edit(array $parameters) : Response
    {
        return $this->post('campaigns/edit', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return Response
     */
    public function delete(array $parameters) : Response
    {
        return $this->post('campaigns/delete', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return Response
     */
    public function send(array $parameters) : Response
    {
        return $this->post('campaigns/send', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return Response
     */
    public function sendTest(array $parameters) : Response
    {
        return $this->post('campaigns/sendTest', $parameters);
    }
}
