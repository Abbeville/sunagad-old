<?php
include "../autoload.php";
new Session;

$login = Auth::login($_POST);

if($login < 1)
{	
	$message = "<div class='alert alert-danger'>Invalid Username or Password</div>";
}
else
{
	Session::start();
	Session::login($_POST['user']);
	$message = 1;
}


echo $message;
