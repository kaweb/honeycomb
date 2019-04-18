<?php
namespace Kaweb\Honeycomb\Categories;


class CompaniesEndpoints extends BaseEndpoints
{
    public function __construct($connection)
    {
		parent::__construct($connection);

    	$this->endpoint = 'users';
    }
}
