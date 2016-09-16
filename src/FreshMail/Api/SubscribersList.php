<?php declare(strict_types=1);

namespace FreshMail\Api;

use FreshMail\Response\Response;

/**
 * Class SubscribersList
 * @package FreshMail\Api
 */
class SubscribersList extends Api
{
    /**
     * @param array $parameters
     *
     * @return Response
     */
    public function create(array $parameters) : Response
    {
        return $this->post('subscribers_list/create', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return Response
     */
    public function update(array $parameters) : Response
    {
        return $this->post('subscribers_list/update', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return Response
     */
    public function delete(array $parameters) : Response
    {
        return $this->post('subscribers_list/delete', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return Response
     */
    public function lists(array $parameters) : Response
    {
        return $this->post('subscribers_list/lists', $parameters);
    }
}
