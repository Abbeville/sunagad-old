<?php 
class Url
{
	public function __construct()
	{
		return true;
	}

	public static function base()
	{
		return __DIR__ . "/../";
	}

	public static function host()
	{
		return "http://".$_SERVER['HTTP_HOST']."/Sunagad";
	}
	public static function link($url)
	{
		return self::host()."/".$url;
	}
	public static function redirect($url)
	{
		echo "<script type='text/javascript'>
			window.location = '".self::host()."/".$url."'
			</script>";
	}
}