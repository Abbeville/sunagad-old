<?php

include '../Contracts/StorageInterface';

class Basket
{
	protected $storage;

	protected $product;
	
	function __construct(StorageInterface $storage, $product)
	{
		$this->storage = $storage;
		$this->product = $product;
	}

	public function add($product)
	{
		if ($this->has($product)) {
			
		}
		
		$this->storage->add($product);
	}

	public function remove($product_id)
	{
		$this->storage->removeItem($product_id)
	}

	public function all()
	{
		$this->storage->getItems();
	}

	public function clear()
	{
		$this->storage->clearStorage();
	}

	public function update($product_id, $quantity)
	{
		if ($this->hasStock($product_id)) {
			$this->get
		}
	}

	public function hasStock()
	{

	}
}