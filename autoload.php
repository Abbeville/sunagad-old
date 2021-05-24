<?php 
	spl_autoload_register(function($class)
	{
		/*if(file_exists("c:/wamp/www/hospital/controllers/".$class.".php"))
		{
			include "c:/wamp/www/hospital/controllers/".$class.".php";
		}
		else
		{
			die("<div style='background:rgba(180,0,0,0.5);color: red;padding:20px;'>Class ".$class." not found");
		}*/
		include "controllers/".$class.".php";
	})
?>