<?php

namespace Kaweb\Honeycomb\Categories;
use Exception;
use Kaweb\Honeycomb\Application;
use Kaweb\Honeycomb\Helpers\RequestHelper;

class BaseEndpoints
{
    use RequestHelper;

    protected $endpoint;
    protected $object;

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
    public function create(array $params = [])
    {
        return $this->post($params);
    }

    /**
     * Get the JSON data from an endpoint.
     *
     * @param string $endpoint
     * @param array $content
     * @return array
     */
    public function retrieve(int $id = null, array $params = [])
    {
        return $this->get($params);
    }

    /**
     * Get the JSON data from an endpoint.
     *
     * @param string $endpoint
     * @param array $content
     * @return array
     */
    public function update(int $id = null, array $content = [])
    {
        return $this->patch($content);
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

        $response = $this->connection->client->request('GET', $this->object.'/'.$id.$this->endpoint, [
            'headers' => $this->connection->headers,
            'query' => $params,
            'http_errors' => false,

        ]);

        return $this->getJsonResponse($response);
    }

    /**
     * POST data to an API endpoint.
     *
     * @param array $content
     * @return array
     */
    public function post(array $content = [])
    {
        $response =  $this->connection->client->request('POST', $this->object.$this->endpoint, [
            'headers' => $this->connection->headers,
            'form_params' => $content,
            'http_errors' => false,
        ]);
        return $this->getJsonResponse($response);

    }

    /**
     * PATCH data to an API endpoint.
     *
     * @param array $content
     * @return array
     */
    public function patch(int $id, array $content = [])
    {
        $response =  $this->connection->client->request('PATCH', $this->object.'/'.$id.$this->endpoint, [
            'headers' => $headers,
            'form_params' => $content,
            'http_errors' => false,

        ]);
        return $this->getJsonResponse($response);

    }


    /**
     * PUT data to an API endpoint.
     *
     * @param array $content
     * @return array
     */
    public function put(int $id, array $content = [])
    {
        $response =  $this->connection->client->request('PUT', $this->object.'/'.$id.$this->endpoint, [
            'headers' => $this->connection->headers,
            'form_params' => $content,
            'http_errors' => false,

        ]);
        return $this->getJsonResponse($response);

    }


    /**
     * Send a DELETE request to an API endpoint.
     *
     * @param array $content
     * @return array
     */
    public function delete(int $id = null)
    {
        $response =  $this->connection->client->request('DELETE', $this->object.'/'.$id.$this->endpoint, [
            'headers' => $this->connection->headers,
            'form_params' => $content,
            'http_errors' => false,

        ]);
        return $this->getJsonResponse($response);

    }
}