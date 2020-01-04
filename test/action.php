<!DOCTYPE HTML>
<html>
<head>
	<!--
	<META http-equiv="refresh" content="5;URL=index.html"> 
	-->
</head>
<body>

<?php


$con=mysqli_connect("localhost","root","","mylab2019") or die("Cannot connect to server.".mysqli_error($con)); 

$name=@$_POST["Name"];
$email=@$_POST["Email"];
$password=@$_POST["Password"];

$sql="INSERT INTO participant VALUES(null,'$name','$email','$password')";

$result=mysqli_query($con,$sql) or die("Error in inserting data due to".mysql_error());

if($result)
{
echo "Your name is: $name";
echo "<br/>";
echo "The email you use is: $email";
echo "<br/>";
echo "Your password is: $password";

header( "refresh:3;url=index.html" );
}

else{
echo "Error in inserting new data";
header( "refresh:3;url=index.html" );
}
?>

</body>
</html>