<?php
namespace Kaweb\Honeycomb\Categories;


class UsersEndpoints extends BaseEndpoints
{
	private $user_id = false;

    public function __construct($connection, $user_id = false)
    {
		parent::__construct($connection);

		$this->object = 'users';

		$this->user_id = $user_id;
	}

	/**
	 * List Api Keys belonging to user
	 * - Admin endpoint
	 */
	public function getApiKeys()
	{
		if (!$this->user_id) {
			// Error: you must specify a user_id
			return false;
		}
		$this->endpoint = '/users/'. $this->user_id .'/api_keys';
		return $this->get();
	}

	/**
	 * Create a new API Key for a User
	 * - Admin endpoint
	 */
	public function createApiKey(array $content = [])
	{
		if (!$this->user_id) {
			// Error: you must specify a user_id
			return false;
		}
		$this->endpoint = '/users/'. $this->user_id .'/api_keys';
		return $this->post($content);
	}
}
