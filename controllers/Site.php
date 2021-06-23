<?php 
class Site extends Db
{
	public function __construct()
	{
		return true;
	}

	public static function addProducts($data,$files)
	{
		//Adding logic
		foreach ($data as $key => $value)
		{
			$$key = $value;
		}


		foreach ($files['image'] as $key => $value)
		{
			$$key = $value;
		}

		$error = "";

		if($type == "image/jpeg" || $type == "image/png" || "image/png")
		{
			$error = $error;
		}
		else
		{
			$error .= "Please upload a valid Image file<br />";
		}

		if($size > 500000)
		{
			$error = "Image file is too large, Should be less than 500Kb<br />";
		}
		else
		{
			$error = $error;
		}

		$image = $name;
		$image_location = $tmp_name;

		if($error == "")
		{
			$loc = __DIR__ . "/../images/";
			move_uploaded_file($image_location, $loc."".$image);
			$data['image'] = $image;
			$pass = "";
			for($a = 0; $a < 9; $a++)
			{
				$num = rand(1,9);
				$pass .= $num;
			}
			$data['pass'] = $pass;
			$data['active'] = 1;
			$data['last_login'] = date('Y-m-d H:i:s');
			
			Db::insert('users',$data);
			$resp = 1;

		}
		else
		{
			$resp = $error;
		}

		return $resp;
	}

	public static function products($id = NULL, $sortby = Null)
	{

		if ($id == null) {
			$query = Db::select('products');
		}else{
			if ($sortby == Null) {
				$query = Db::select('products','id = \''.$id.'\'');
			}else{
				$query = Db::select('products', $sortby.' = \''.$id.'\'');
			}
		}

		return $query;
	}

	public static function addCategory($data)
	{

		Db::insert('categories',$data);
		$resp = 1;
	}

	public static function categories($id = NULL)
	{
		if ($id == null) {
			$query = Db::select('categories');
		}else{
			$query = Db::select('categories','id = \''.$id.'\'');
		}
	}

	public static function addToCart($data){
		$basket->add($data['product_id']);
	}

	public function removeFromCart($data){
		
	}

	public static function createOrder(){

		//Add customer
		//Add address
	}

	private function addCustomers($data){

	}

	private function addAddress($data){

	}

}