<?php
namespace Kaweb\Honeycomb\Categories;


class CompaniesEndpoints extends BaseEndpoints
{
    public function __construct($connection)
    {
		parent::__construct($connection);

    	$this->object = 'companies';
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

    /**
     * PATCH data to an API endpoint.
     *
     * @param array $content
     * @return array
     */
    public function addons(int $id, array $content = [])
    {
    	$this->endpoint = '/addons';
    	return $this->put($id, $content);
    }
}
