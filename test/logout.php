<?php
session_start();

if(isset($_SESSION['email']))
{
	session_destroy();
	echo 'You have been logged out.';
	header("refresh:1.5; url=../signin.html");

}
exit();
?>