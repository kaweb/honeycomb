<?php

namespace Kaweb\Honeycomb\Helpers;
use \GuzzleHttp\Client;


class RequestHelper
{
    /**
     * @var string
     */
    public $base_uri = "https://www.inventoryhive.co.uk/api/";

    /**
     * @var string
     */
    public $version = "1";

    /**
     * @var string
     */
    protected $token;

    /**
     * @var object
     */
    protected $client;

    /**
     * RequestHelper constructor.
     * @param string $subdomain
     * @param string $token
     */
    public function __construct(array $config)
    {

        if($config['base_uri']) $this->base_uri = $config['base_uri'];
        if($config['version']) $this->version = $config['version'];

        $headers = [
            "Accept" => "application/json",
            "Content-Type" => "application/x-www-form-urlencoded"
        ];

        $this->client = new GuzzleHttp\Client([
            'base_url' => $this->base_uri. 'v' .$this->version .'/',
            'headers' => $headers,
        ]);

        try {

            $this->token = $this->login($config);

            $client->setDefaultOption('headers/Authorization', "Bearer {$this->token}");

        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    /**
     * Get the JSON data from an endpoint.
     *
     * @param string $endpoint
     * @param array $content
     * @return array
     */
    public function login($config)
    {

        if(empty($config['username'])) {
            throw new Exception('Username not set');
        }
        if(empty($config['password'])) {
            throw new Exception('Password not set');
        }
        if(empty($config['client_id'])) {
            throw new Exception('Client ID not set');
        }
        if(empty($config['client_secret'])) {
            throw new Exception('Client Secret not set');
        }

        $this->client('POST', 'oauth/token', [
            'username' => $config['username'],
            'password' => $config['password'],
            'client_id' => $config['client_id'],
            'client_secret' => $config['client_secret'],
            'grant_type' => 'password',
            'scope' => '',
        ]);
    }

    /**
     * Get the JSON data from an endpoint.
     *
     * @param string $endpoint
     * @param array $content
     * @return array
     */
    public function get($endpoint, array $content = [])
    {
        return $this->client('GET', $endpoint, $content);
    }

    /**
     * POST data to an API endpoint.
     *
     * @param string $endpoint
     * @param array $content
     * @return array
     */
    public function post($endpoint, array $content = [])
    {
        return $this->client('POST', $endpoint, $content);
    }

    /**
     * PATCH data to an API endpoint.
     *
     * @param string $endpoint
     * @param array $content
     * @return array
     */
    public function patch($endpoint, array $content = [])
    {
        return $this->client('PATCH', $endpoint, $content);
    }


    /**
     * PUT data to an API endpoint.
     *
     * @param string $endpoint
     * @param array $content
     * @return array
     */
    public function put($endpoint, array $content = [])
    {
        return $this->client('PUT', $endpoint, $content);
    }


    /**
     * Send a DELETE request to an API endpoint.
     *
     * @param string $endpoint
     * @param array $content
     * @return array
     */
    public function delete($endpoint, array $content = [])
    {
        return $this->client('DELETE', $endpoint, $content);
    }

    /**
     * Send a request based on the given params.
     *
     * @param string $method
     * @param string $endpoint
     * @param array $content
     * @return array
     */
    public function request($method, $endpoint, array $content)
    {
        $requestUrl = $this->baseUrl .'v'. $version .'/'. $endpoint;

        if (substr($endpoint, 0, 1) !== '/') {
            $requestUrl = $endpoint;
        }

        $headers = [
            "Authorization: Bearer {$this->token}",
            "Content-Type: application/x-www-form-urlencoded"
        ];
        $requestOptions = [
            "http" => [
                "method" => $method,
                "header" => implode("\r\n", $headers),
                "content" => http_build_query($content),
                "ignore_errors" => true
            ]
        ];

        $context = stream_context_create($requestOptions);
        $contents = file_get_contents($requestUrl, false, $context);
        $response = json_decode($contents, true);

        if (is_null($response)) {
            $response['error'] = "Please check your OAuth token is correct.";
        }

        return $response;
    }
}