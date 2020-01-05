<?php


$con=mysqli_connect("localhost","root","","eventwp") or die("cannot connect to the server.".mysqli_error($con));


//update
$sql="UPDATE ticket SET ticket_id='$_POST[ticketid]',ticket_type='$_POST[tickettype]', ticket_price='$_POST[ticketprice]', ticket_desc='$_POST[ticketdesc]', ticket_qty='$_POST[ticketqty]' WHERE ticket_id='$_POST[ticketid]'";

$sql_result=mysqli_query($con,$sql) or die("Error in sql due to ".mysql_error());

if($sql_result)

	header ("refresh:3; url=ticket.php?update=Ticket Details has been updated");

 else
 
 	echo "Error in updating the ticket details"; 

?>

<!-- Animation part -->
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
<span class="txt">Updating..</span>
</div>

	<video id="videoBG" autoplay muted loop>
		<source src="assets/vid/tommorowland_vid.mp4" type="video/mp4">
		</video>
</body>
</html>