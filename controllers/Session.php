<?php 
class Session
{
	public function __construct()
	{
		return true;
	}

	public static function start()
	{
		session_start();
	}

	public static function stop()
	{
		session_destroy();
	}

	public static function is_user()
	{
		if(isset($_SESSION['user_loggedin']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public static function is_admin()
	{
		if(isset($_SESSION['admin_loggedin']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public static function setFlash($name,$message, $type = "error")
	{
		if($type == "error")
		{
			$class = "alert alert-danger";
		}
		elseif($type == "success")
		{
			$class = "alert alert-success";
		}
		elseif($type == "info")
		{
			$class = "alert alert-info";
		}
		else
		{
			$class = "alert alert-warning";
		}

		$mess = "<div class='".$class."'>".$message."</div>";

		$_SESSION[$name] = $mess;

		return $_SESSION[$name];
	}

	public static function current_user($field = 'username')
	{
		$user = $_SESSION['hospital_whois'];
		$user = Db::select('users','username = \''.$user.'\'');
		return $user[0]->$field;
	}

	public static function getFlash($name)
	{
		echo $_SESSION[$name];
	}

	public static function login($username)
	{
		$_SESSION['admin_loggedin'] = true;
		$_SESSION['hospital_whois'] = $username;
		Db::updater('admin', array('last_login'=>'CURRENT_TIMESTAMP'), 'username = \''.$username.'\'');
	}

	public static function clear($name)
	{
		$_SESSION[$name] = "";
	}

	public static function logout()
	{
		session_destroy();
		Url::redirect('admin_login.php');
	}
}