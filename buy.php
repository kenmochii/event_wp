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

if (mysqli_num_rows($sql_result)>2) //to return the query result in number of rows
{
	header("refresh:2.0; url=user.php");
 	die("You already have already reach the limit purchase tickets");

}

else
	{
//if statement to set limit if total purchased already reach total quantity of ticket
		$sql="SELECT * FROM ticket";

		$result=mysqli_query($con,$sql) or die("cannot execute sql");

		while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
		{
		$tid=$row[0];
		//echo "aa";


		$sql1="SELECT COUNT(ticket_id) as total FROM user_ticket WHERE ticket_id='$tid'";
 
		$result1=mysqli_query($con,$sql1) or die("cannot execute sql");

		$total = 0;
		while ($row = mysqli_fetch_array($result1, MYSQLI_BOTH)) {
	    $total = $row['total'];


																}











		$query1 = "SELECT * FROM ticket WHERE ticket_qty='$total'";
		$sql_result1 = mysqli_query($con , $query1);

		if(mysqli_num_rows($sql_result1)==0){
			


			header("refresh:2; url=user.php");
 			die("Ticket have been sold out!");


		}



		else{
//sampai sini sahaja


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