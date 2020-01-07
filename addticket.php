<!DOCTYPE html>
<html>
<head>
	 <link href="assets/css/font-awesome.css" rel="stylesheet" />
	 <link href="assets/css/loading.css" rel="stylesheet" />
</head>

<body>

	<div class="loader">   
	<span class="box"></span>   
	<span class="box"></span>  
<div class="code"> 
<img src="assets/img/no_background.png" width="120px">
</div>    
<span class="txt">adding new ticket...</span>
</div>

	<video id="videoBG" autoplay muted loop>
		<source src="assets/vid/Tomorrowland_scenery1.mp4" type="video/mp4">
		</video>



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
	header("refresh:2.0; url=ticket.php?error=");
 	//die("Ticket ID is already exist. Please try again.");

}

else
	{

	$sql="INSERT INTO ticket VALUES('$ticketid', '$tickettype', '$ticketprice', '$ticketdesc', '$ticketqty')";

	$result =mysqli_query($con,$sql) or die("Error in inserting data due to ".mysqli_error($con));

	if($result)
		{
		mysqli_close($con);

		header("refresh:2.0; url=ticket.php?success=");
		}
	else
	 	{
	 	header("refresh:2.0; url=ticket.php?error2=");
		}
	}

?>


</body>

</html>