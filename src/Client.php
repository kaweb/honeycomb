<?php

namespace Kaweb\Honeycomb;

use Kaweb\Honeycomb\Categories\CompaniesEndpoints;
use Kaweb\Honeycomb\Helpers\RequestHelper;

class Client
{
    /**
     * @var RequestHelper
     */
    protected $requestHelper;

    /**
     * @var Config
     */
    protected $config;

    /**
     * Client constructor.
     *
     * @param RequestHelper $requestHelper
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->requestHelper = new requestHelper($this->config);
    }

    public function Login($username, $password, $client_id, $client_secret)
    {
        return $this->requestHelper->login($username, $password, $client_id, $client_secret);
    }

    public function CompanyEndpoints()
    {
        return new CompanyEndpoints($this->requestHelper);
    }
}