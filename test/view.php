<!DOCTYPE HTML>
<html>
<body>
<?php

 echo "<table border='1'><tr>
 <td>ID Participant</td>
 <td>Participant Name</td>
 <td>Participant Email</td>
 </tr>";

$con=mysqli_connect("localhost", "root", "","mylab2019") or die("Cannot connect to server.".mysqli_error($con));

$sql="SELECT * FROM participant";

 $result=mysqli_query($con,$sql) or die("Cannot execute sql.");
 
 while($data=mysqli_fetch_array($result,MYSQLI_NUM))

 {
 $id=$data[0];
 $name=$data[1];
 $email=$data[2];

 echo "<tr>
 <td>$id</td>
 <td>$name</td>
 <td>$email</td>
 </tr>";

 }

 echo "</table>";

?>

</body>
</html> 