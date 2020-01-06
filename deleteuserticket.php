<?php

$con=mysqli_connect("localhost","root","","eventwp") or die("cannot connect to the server.".mysqli_error($con));


$pid=$_GET["purchaseid"];

//delete

$sql="DELETE FROM user_ticket WHERE purchase_id='$pid'";



if(mysqli_query($con,$sql))
	header ("location:admin.php?delete=");
								
else

	echo"Purchase details cannot be deleted :/ ";

?>
<html>
<head>
	 <link href="assets/css/font-awesome.css" rel="stylesheet" />
	 <link href="assets/css/loading.css" rel="stylesheet" />

	</head>
<body>

<!-- Animation part -->
	<div class="loader">   
	<span class="box"></span>   
	<span class="box"></span>  
<div class="code"> 
<img src="assets/img/no_background.png" width="120px">
</div>    
<span class="txt">Deleting...</span>
</div>

	<video id="videoBG" autoplay muted loop>
		<source src="assets/vid/tommorowland_vid.mp4" type="video/mp4">
		</video>
</body>
</html>