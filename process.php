<!DOCTYPE html>
<html>
<head></head>

<body>

<?php

$con = mysqli_connect('localhost','root','','eventwp');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$email=$_POST["email"];
$password=$_POST["password"];
$fname=$_POST["first_name"];
$lname=$_POST["last_name"];
$gender=$_POST["gender"];
$phone=$_POST["phone"];
//$ticket=$_POST["ticket"];


$query = "SELECT * FROM user WHERE email='$email' ";
$sql_result = mysqli_query($con , $query);
if (mysqli_num_rows($sql_result)>0) //to return the query result in number of rows
{
	header("refresh:4.0; url=register.html");
 	die("Email account is already exist. Please try to register again.");

}


else
	{

	$sql=" INSERT INTO user VALUES('$email', '$password', '$fname', '$lname', 'User', '$phone', '$gender') ";

	$result =mysqli_query($con,$sql) or die("Error in inserting data due to ".mysqli_error($con));

	if($result)
		{
	 	echo "You have successfully registered in Tomorrowland!";
		mysqli_close($con);

		header("refresh:4.0; url=signin.html");
		}
	else
	 	{
	 	echo "Error in registration new user. Please try to register again."; 
	 	header("refresh:4.0; url=register.html");
		}
	}

?>


</body>

</html>