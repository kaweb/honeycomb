<?php

namespace Kaweb\Honeycomb;

require  __DIR__ .'/../vendor/autoload.php';

use Kaweb\Honeycomb\Helpers\RequestHelper;
use Kaweb\Honeycomb\Categories\CompaniesEndpoints;
use Kaweb\Honeycomb\Remote\Connection;

use GuzzleHttp\Client as GuzzleClient;

class Application
{

    use RequestHelper;

    /**
     * @var array
     */
    protected $config = [
        'base_uri' => 'https://www.inventoryhive.co.uk/api',
        'version' => '1',
    ];

    /**
     * Client constructor.
     *
     * @param RequestHelper $requestHelper
     */
    public function __construct(array $config)
    {
        $this->config = $config;

        $this->connection = new Connection($this->config);
    }


    public function Companies()
    {
        return new CompaniesEndpoints($this->connection);
    }
}