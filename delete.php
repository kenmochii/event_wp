<?php

$con=mysqli_connect("localhost","root","","eventwp") or die("cannot connect to the server.".mysqli_error($con));


$email=$_GET["e_email"];

//delete

$sql="DELETE FROM user WHERE email='$email'";



if(mysqli_query($con,$sql))
	header ("refresh:1;url=admin_user_details.php");
	
	
								
else

	echo"data cannot be deleted :/ ";

?>