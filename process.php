<!DOCTYPE html>
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
<span class="txt">Registering'...</span>
</div>

	<video id="videoBG" autoplay muted loop>
		<source src="assets/vid/Tomorrowland_signin.mp4" type="video/mp4">
		</video>

<?php

$con = mysqli_connect('localhost','root','','eventwp');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$email=$_POST["email"];
$password=$_POST["password"];
$fname=$_POST["first_name"];
$lname=$_POST["last_name"];
$phone=$_POST["phone"];
$gender=$_POST["gender"];
//$ticket=$_POST["ticket"];


$query = "SELECT * FROM user WHERE email='$email' ";
$sql_result = mysqli_query($con , $query);
if (mysqli_num_rows($sql_result)>0) //to return the query result in number of rows
{
	header("refresh:4.0; url=register.html?error=email already doesn't exist");
 	//die("Email account is already exist. Please try to register again.");
die();
}


else
	{

	$sql=" INSERT INTO user VALUES('$email', '$password', '$fname', '$lname', 'User', '$phone', '$gender') ";

	$result =mysqli_query($con,$sql) or die("Error in inserting data due to ".mysqli_error($con));

	if($result)
		{
	 	//echo "You have successfully registered in Tomorrowland!";
		mysqli_close($con);

		header("refresh:3.0; url=signin.php");
		}
	else
	 	{
	 	//echo "Error in registration new user. Please try to register again."; 
	 	header("refresh:3.0; url=register.html");
		}
	}

?>


</body>
</html>
