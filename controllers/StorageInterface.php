<?php

// namespace 

interface StorageInterface
{
	public function set($index, $value);

	public function get($index);
	
	public function exists($index);

	public function all();

	public function unset($index);

	public function clear();

}