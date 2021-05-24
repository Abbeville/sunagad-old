<?php 
class Page extends Url
{
	public function __construct()
	{
		return true;
	}

	public static function load($page)
	{
		$file = parent::base()."/pages/".$page.".php";
		if(file_exists($file))
		{
			include $file;
		}
		else
		{
			include parent::base()."/pages/notfound.php";
		}
	}
}