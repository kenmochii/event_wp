<?php
session_start();
//$_SESSION["usertype"];
if(isset($_SESSION['email']))
{
    //echo "Welcome "; echo $_SESSION['fname'];
?>

<!DOCTYPE html>
<html>
<head></head>

<body>

<?php

$con = mysqli_connect('localhost','root','','eventwp');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$ticketid=$_POST["tid"];
$email_exist=$_SESSION["email"];
//$ticketno=$_SESSION['ticket_no'];


$query = "SELECT * FROM user_ticket WHERE email='$email_exist' ";
$sql_result = mysqli_query($con , $query);

if (mysqli_num_rows($sql_result)>0) //to return the query result in number of rows
{
	header("refresh:2.0; url=user.php");
 	die("You already have a ticket");

}

else
	{

	$sql="INSERT INTO user_ticket VALUES(null, '$email_exist', '$ticketid')";


	$result =mysqli_query($con,$sql) or die("Error in inserting data due to ".mysqli_error($con));

	if($result)
		{
	 	header("refresh:2; url=user.php");
	 	
		die("You successfully buy a ticket to Tomorrowland!");
		mysqli_close($con);


		}
	else
	 	{
	 	echo "Error in adding new ticket. Please try to again.";
	 	header("refresh:2; url=event.php");
		}
	}

?>
 <?php //put right before close </body> tag

}
    

else
 echo "No session exist or session is expired. Please log in again";
 header("refresh:2.0; url:../signin.html");
?> 
</body>

</html>