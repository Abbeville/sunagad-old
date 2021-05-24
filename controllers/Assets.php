<?php 
class Assets extends Url
{
	public function __construc()
	{
		return true;
	}

	public static function css($file)
	{
		return "<link rel='stylesheet' type='text/css' href='".parent::host()."/css/".$file."' />";
	}

	public static function js($js)
	{
		return "<script type='text/javascript' src='".parent::host()."/js/".$js."'></script>";
	}
}