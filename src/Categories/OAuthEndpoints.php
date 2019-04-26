<?php
namespace Kaweb\Honeycomb\Categories;


class OAuthEndpoints extends BaseEndpoints
{
    public function __construct($connection)
    {
		parent::__construct($connection);

    	$this->object = 'oauth';
    }
}
