<?php

class Basket
{
	protected $storage;

	// protected $product_id;
	
	function __construct(StorageInterface $storage)
	{
		$this->storage = $storage;
		// $this->product_id = $product_id;
	}

	public function add($product_id, $quantity)
	{
		if ($this->has($product_id)) {
			//set quantity to the current quantity + new quantity
			$quantity = $this->get($product_id)['quantity'] + $quantity;
		}
		
		//update session with product
		$this->update($product_id, $quantity);
	}

	public function update($product_id, $quantity)
	{
		/*if (!$this->has($product_id, $quantity)) {
			//return exception
			throw new QuantityExceededException;
		}*/

		if($quantity === 0){
			$this->remove($product_id);

			return;
		}

		$this->storage->set($product_id, [
			'product_id' => (int) $product_id,
			'quantity' => (int) $quantity
		]);
	}

	public function remove($product_id)
	{
		$this->storage->unset($product_id);
	}

	public function has($product_id)
	{
		return $this->storage->exists($product_id);
	}

	public function get($product_id)
	{
		return $this->storage->get($product_id);
	}

	public function clear()
	{
		$this->storage->clear();
	}

	public function all()
	{
		$ids = [];
		$items = [];

		foreach($this->storage->all() as $product){
			$ids[] = $product['product_id'];
		}

		//Get products by Ids (It needs to be converted to raw queries)
		// $products = Db::select('products', 'id IN ('.implode(',', $ids).')');

		/*$products = $this->product->find($ids);


		foreach($products as $product){
			$product->quantity = $this->get($product)['quantity'];

			$items[] = $product;
		}

		return $items;*/
	}

	public function itemCount()
	{
		return count($this->storage);
	}

}