<?php declare(strict_types=1);

namespace FreshMail\Api;

use FreshMail\Response\Response;

/**
 * Class Subscriber
 * @package FreshMail\Api
 */
class Subscriber extends Api
{
    /**
     * @param array $parameters
     *
     * @return Response
     */
    public function add(array $parameters) : Response
    {
        return $this->post('subscriber/add', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return Response
     */
    public function edit(array $parameters) : Response
    {
        return $this->post('subscriber/edit', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return Response
     */
    public function delete(array $parameters) : Response
    {
        return $this->post('subscriber/delete', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return Response
     */
    public function getHistory(array $parameters) : Response
    {
        return $this->post('subscriber/getHistory', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return Response
     */
    public function addMultiple(array $parameters) : Response
    {
        return $this->post('subscriber/addMultiple', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return Response
     */
    public function editMultiple(array $parameters) : Response
    {
        return $this->post('subscriber/editMultiple', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return Response
     */
    public function deleteMultiple(array $parameters) : Response
    {
        return $this->post('subscriber/deleteMultiple', $parameters);
    }
}
