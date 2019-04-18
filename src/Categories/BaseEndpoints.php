<?php

namespace Kaweb\Honeycomb\Categories;
use Exception;
use Kaweb\Honeycomb\Application;
use Kaweb\Honeycomb\Helpers\RequestHelper;

class BaseEndpoints
{
    use RequestHelper;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->connection->checkToken();
    }

    /**
     * Get the JSON data from an endpoint.
     *
     * @param string $endpoint
     * @param array $content
     * @return array
     */
    public function getAll(array $params = [])
    {
        return $this->get(null, $params);
    }


    /**
     * Get the JSON data from an endpoint.
     *
     * @param string $endpoint
     * @param array $content
     * @return array
     */
    public function get(int $id = null, array $params = [])
    {

        $responce = $this->connection->client->request('GET', $this->object.'/'.$id.$this->endpoint, [
            'headers' => $this->connection->headers,
            'query' => $params,
            'http_errors' => false,

        ]);

        return $this->getJsonResponse($responce);
    }

    /**
     * POST data to an API endpoint.
     *
     * @param array $content
     * @return array
     */
    public function post(array $content = [])
    {
        $responce =  $this->connection->client->request('POST', $this->object.$this->endpoint, [
            'headers' => $this->connection->headers,
            'form_params' => $content,
            'http_errors' => false,
        ]);
        return $this->getJsonResponse($responce);

    }

    /**
     * PATCH data to an API endpoint.
     *
     * @param array $content
     * @return array
     */
    public function patch(int $id, array $content = [])
    {
        $responce =  $this->connection->client->request('PATCH', $this->object.'/'.$id.$this->endpoint, [
            'headers' => $headers,
            'form_params' => $content,
            'http_errors' => false,

        ]);
        return $this->getJsonResponse($responce);

    }


    /**
     * PUT data to an API endpoint.
     *
     * @param array $content
     * @return array
     */
    public function put(int $id, array $content = [])
    {
        $responce =  $this->connection->client->request('PUT', $this->object.'/'.$id.$this->endpoint, [
            'headers' => $this->connection->headers,
            'form_params' => $content,
            'http_errors' => false,

        ]);
        return $this->getJsonResponse($responce);

    }


    /**
     * Send a DELETE request to an API endpoint.
     *
     * @param array $content
     * @return array
     */
    public function delete(int $id = null)
    {
        $responce =  $this->connection->client->request('DELETE', $this->object.'/'.$id.$this->endpoint, [
            'headers' => $this->connection->headers,
            'form_params' => $content,
            'http_errors' => false,

        ]);
        return $this->getJsonResponse($responce);

    }
}