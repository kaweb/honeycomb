<?php

namespace Kaweb\Honeycomb\Remote;
use GuzzleHttp\Client as GuzzleClient;
use Exception;
use Kaweb\Honeycomb\Application;
use Kaweb\Honeycomb\Helpers\RequestHelper;

class Connection
{

    use RequestHelper;

    /**
     * @var array
     */
    public $headers = [
        "Accept" => "application/json",
        "Content-Type" => "application/x-www-form-urlencoded"
    ];

    /**
     * @var object
     */
    protected $token;

    /**
     * Client constructor.
     *
     * @param RequestHelper $requestHelper
     */
    public function __construct(array $config)
    {
        $this->config = $config;

        $this->client = new GuzzleClient([
            'base_uri' => $config['base_uri']. 'v' .$config['version'] .'/',
            'headers' => $this->headers,
        ]);

        $this->login();
    }

    /**
     * Get the JSON data from an endpoint.
     *
     * @param boolean $refresh
     */
    public function login($refresh=false)
    {
        if(empty($this->config['username'])) {
            throw new Exception('Username not set');
        }
        if(empty($this->config['password'])) {
            throw new Exception('Password not set');
        }
        if(empty($this->config['client_id'])) {
            throw new Exception('Client ID not set');
        }
        if(empty($this->config['client_secret'])) {
            throw new Exception('Client Secret not set');
        }

        $params = [
            'client_id' => $this->config['client_id'],
            'client_secret' => $this->config['client_secret'],
            'scope' => ''
        ];

        if($refresh) {
            $params = array_merge($params, [
                'refresh_token' => $this->token->refresh_token,
                'grant_type' => 'refresh_token',
            ]);
        } else {
            $params = array_merge($params, [
                'username' => $this->config['username'],
                'password' => $this->config['password'],
                'grant_type' => 'password',
            ]);
        }

        $response = $this->client->request('POST', 'oauth/token', [
            "headers" => $this->headers,
            'form_params' => $params,
        ]);

        $this->token = $this->getJsonResponse($response);
        $this->headers['Authorization'] = "Bearer {$this->token->access_token}";
    }

    /**
     * Check OAuth token for freshness
     *
     * @return bool
     */
    public function checkToken()
    {
        if($this->token->expires_in < time()) {
            $this->login(true);
        }
    }
}