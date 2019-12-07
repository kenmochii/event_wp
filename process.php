<!DOCTYPE html>
<html>
<head></head>

<body>

<?php

$con = mysqli_connect('localhost','root','','eventwp');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$fname=$_POST["first_name"];
$lname=$_POST["last_name"];
$dob=$_POST["birthday"];
$gender=$_POST["gender"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$ticket=$_POST["ticket"];


$sql=" INSERT INTO client ('', '$fname', '$lname', '$dob', '$gender', '$email', '$phone', '$ticket') ";
mysqli_query($con,$sql);


if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);




echo "Your name is $fname $lname";
echo "<br>";
echo "Your date of birth is $dob";
echo "<br>";
echo "Your gender is $gender";
echo "<br>";
echo "Your email address is $email";
echo "<br>";
echo "Your phone is $phone";
echo "<br>";
echo "You choose $ticket ticket";
echo "<br>";

?>


</body>

</html>