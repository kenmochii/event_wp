<?php


$con=mysqli_connect("localhost","root","","eventwp") or die("cannot connect to the server.".mysqli_error($con));


//update
$sql="UPDATE user SET fname='$_POST[f_fname]', lname='$_POST[l_lname]', phoneno='$_POST[p_pnum]', gender='$_POST[g_gender]' WHERE email='$_POST[e_email]'";

$sql_result=mysqli_query($con,$sql) or die("Error in sql due to ".mysql_error());

if($sql_result)

	header ("refresh:3;url=userprofile.php?message=Data has been updated");

 else
 
 	echo "Error in updating the data"; 

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
<span class="txt">Updating...</span>
</div>

	<video id="videoBG" autoplay muted loop>
		<source src="assets/vid/Tomorrowland_scenery1.mp4" type="video/mp4">
		</video>
</body>
</html>