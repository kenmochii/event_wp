<?php
session_start();

if(isset($_SESSION['email']))
{
	session_destroy();
	echo 'You have been logged out.';
	header("refresh:2.0; url=localhost/event_wp");

}
exit();
?>