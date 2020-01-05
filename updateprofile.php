<?php


$con=mysqli_connect("localhost","root","","eventwp") or die("cannot connect to the server.".mysqli_error($con));


//update
$sql="UPDATE user SET fname='$_POST[f_fname]', lname='$_POST[l_lname]', phoneno='$_POST[p_pnum]', gender='$_POST[g_gender]' WHERE email='$_POST[e_email]'";

$sql_result=mysqli_query($con,$sql) or die("Error in sql due to ".mysql_error());

if($sql_result)

	header ("refresh:1;url=userprofile.php?message=Data has been updated");

 else
 
 	echo "Error in updating the data"; 

?>