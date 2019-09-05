<?php
namespace Kaweb\Honeycomb\Categories;


class BranchesEndpoints extends BaseEndpoints
{
    public function __construct($connection)
    {
		parent::__construct($connection);

    	$this->object = 'branches';
    }
}
