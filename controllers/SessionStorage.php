<?php

include "../Contracts/StorageInterface";

use Countable;



class SessionStorage implements StorageInterface
{

	protected $bucket
	
	function __construct($bucket = 'default')
	{
		if (!isset($_SESSION[$bucket])) {
			$_SESSION[$bucket] = [];
		}
		$this->bucket = $bucket;
	}
}