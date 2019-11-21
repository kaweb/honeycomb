<?php
namespace Kaweb\Honeycomb\Categories;


class UsersEndpoints extends BaseEndpoints
{
	private $user_id;

    public function __construct($connection, $user_id = null)
    {
		parent::__construct($connection);

		$this->object = 'users';

		$this->user_id = $user_id;
	}
}
