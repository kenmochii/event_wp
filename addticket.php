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
$tickettype=$_POST["ttype"];
$ticketprice=$_POST["tprice"];
$ticketdesc=$_POST["tdesc"];
$ticketqty=$_POST["tqty"];


$query = "SELECT * FROM ticket WHERE ticket_id='$ticketid' ";
$sql_result = mysqli_query($con , $query);

if (mysqli_num_rows($sql_result)>0) //to return the query result in number of rows
{
	header("refresh:2.0; url=ticket.php");
 	die("Ticket ID is already exist. Please try again.");

}

else
	{

	$sql="INSERT INTO ticket VALUES('$ticketid', '$tickettype', '$ticketprice', '$ticketdesc', '$ticketqty')";

	$result =mysqli_query($con,$sql) or die("Error in inserting data due to ".mysqli_error($con));

	if($result)
		{
	 	echo "Your new ticket successfully added to Tomorrowland!";
		mysqli_close($con);

		header("refresh:2.0; url=ticket.php");
		}
	else
	 	{
	 	echo "Error in adding new ticket. Please try to again.";
	 	header("refresh:2.0; url=ticket.php");
		}
	}

?>


</body>

</html>