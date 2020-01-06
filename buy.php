<?php
session_start();
//$_SESSION["usertype"];
if(isset($_SESSION['email']))
{
    //echo "Welcome "; echo $_SESSION['fname'];
?>

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
<span class="txt">We are trying to find ticket for you..</span>
</div>

	<video id="videoBG" autoplay muted loop>
		<source src="assets/vid/tommorowland_vid.mp4" type="video/mp4">
		</video>


<?php

$con = mysqli_connect('localhost','root','','eventwp');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$ticketid=$_POST["tid"];
$email_exist=$_SESSION["email"];
$fname=$_SESSION["fname"];
//$ticketno=$_SESSION['ticket_no'];


$query = "SELECT * FROM user_ticket WHERE email='$email_exist' ";
$sql_result = mysqli_query($con , $query);

if (mysqli_num_rows($sql_result)>=6) //to return the query result in number of rows
{
	header("refresh:2.0; url=user.php?error=");
 	//die("You already have already reach the limit purchase tickets");
 	die();

}

else
	{
//if statement to set limit if total purchased already reach total quantity of ticket
		$sql="SELECT * FROM ticket WHERE ticket_id='$ticketid'";
		$result=mysqli_query($con,$sql) or die("cannot execute sql");
		while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
		{
			$tid=$row[0];
			$ticketquan=$row[4];

			
		}
		///////////////////////////////
		$sql1="SELECT COUNT(ticket_id) as total FROM user_ticket WHERE ticket_id='$tid'";
	 
		$result1=mysqli_query($con,$sql1) or die("cannot execute sql");

		$total = 0;
		while ($row1 = mysqli_fetch_array($result1, MYSQLI_BOTH)) 
			{
			    $total = $row1['total'];


				//$query1 = "SELECT * FROM ticket WHERE ticket_qty='$total'";
				
				//$sql_result1 = mysqli_query($con , $query1);
				//echo "$total";
				//$total_ticket=$total-$ticketquan;
				//echo "$total_ticket";
				if(($total-$ticketquan)>=0){

				header("refresh:2; url=user.php?error2=");
	 			//die("Ticket have been sold out!");
	 			die();


			}

		else

		{
//sampai sini sahaja


		$sql="INSERT INTO user_ticket VALUES(null, '$fname' ,'$email_exist', '$ticketid')";


		$result =mysqli_query($con,$sql) or die("Error in inserting data due to ".mysqli_error($con));

		if($result)
			{
		 	header("refresh:2; url=user.php?success=");
		 	//echo "$ticketid";
			//die("You successfully buy a ticket to Tomorrowland!");
			die();
			mysqli_close($con);


			}
		else
		 	{
		 	echo "Error in adding new ticket. Please try to again.";
		 	header("refresh:2; url=event.php");
			}
	}
}

?>
 <?php //put right before close </body> tag

}
 
 echo "No session exist or session is expired. Please log in again";
 header("refresh:2.0; url:../signin.php");
}
?> 
</body>

</html>