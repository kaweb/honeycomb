<?php
namespace Kaweb\Honeycomb\Categories;


class ApiUsersEndpoints extends BaseEndpoints
{
    public function __construct($connection)
    {
		parent::__construct($connection);

    	$this->object = 'api_users';
    }

    /**
     * POST data to an API endpoint.
     *
     * @param array $content
     * @return array
     */
    public function register(array $content = [])
    {
    	$this->endpoint = '/register';
    	return $this->post($content);
    }
}
