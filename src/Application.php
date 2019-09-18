<?php

namespace Kaweb\Honeycomb;

use Kaweb\Honeycomb\Helpers\RequestHelper;
use Kaweb\Honeycomb\Categories\CompaniesEndpoints;
use Kaweb\Honeycomb\Categories\BranchesEndpoints;
use Kaweb\Honeycomb\Categories\UsersEndpoints;
use Kaweb\Honeycomb\Categories\ApiUsersEndpoints;
use Kaweb\Honeycomb\Categories\OAuthEndpoints;
use Kaweb\Honeycomb\Remote\Connection;

use GuzzleHttp\Client as GuzzleClient;

class Application
{

    use RequestHelper;

    /**
     * @var array
     */
    protected $config = [
        'base_uri' => 'https://www.propertyreporting.co.uk/api',
        'version' => '1',
    ];

    /**
     * Client constructor.
     *
     * @param RequestHelper $requestHelper
     */
    public function __construct(array $config)
    {
        $this->config = array_merge($this->config, array_filter($config));

        $this->connection = new Connection($this->config);
    }


    public function Companies()
    {
        return new CompaniesEndpoints($this->connection);
    }

    public function Branches()
    {
        return new BranchesEndpoints($this->connection);
    }

    public function Users($user_id = false)
    {
        return new UsersEndpoints($this->connection, $user_id);
    }

    public function OAuth()
    {
        return new OAuthEndpoints($this->connection);
    }
}