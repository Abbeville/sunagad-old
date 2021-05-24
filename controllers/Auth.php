<?php 
class Auth extends Db
{
	public function __construct()
	{
		return true;
	}
	public static function login($data)
	{
		foreach ($data as $key => $value)
		{
			$$key = $value;
		}

		$query = parent::select('users',"username = '".$user."' AND password = '".$pass."'");
		$count = count($query);
		if($count < 1)
		{
			Session::setFlash('login_error','Username or password incorrect','error');
			$resp = false;
		}
		else
		{
			$resp = true;
		}

		return $resp;
	}
}