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

$sql=" INSERT INTO user VALUES('$email', '$password', '$fname', '$lname', 'User', '$phone', '$gender', NULL) ";

$result =mysqli_query($con,$sql) or die("Error in inserting data due to ".mysql_error());

if($result)
{
 echo "You have successfully registered in Tomorrowland!";

 mysqli_close($con);

header("refresh:4.0; url=signin.html");
}
 else
 {
 echo "Error in registration new user. Please try to register again."; 
 header("refresh:4.0; url=registration.html");
}


?>


</body>

</html>