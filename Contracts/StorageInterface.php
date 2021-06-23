<?php

// namespace 

interface StorageInterface()
{
	public function set($index);

	public function get($index);

	public function all();

	public function exists($index);

	public function unset($index);

	public function clear();

}