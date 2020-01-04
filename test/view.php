<?php
//call this function to check if session is exists or not
session_start();
$_SESSION["usertype"];
if(isset($_SESSION['email']))
{
	echo "Welcome "; echo $_SESSION['fname'];
	echo "<br><br>"
?> 

<!DOCTYPE HTML>
<html>
<body>
<?php

 echo "<table border='1'><tr>
 <td>Ticket ID</td>
 <td>Ticket Type</td>
 <td>Ticket Price</td>
 <td>Ticket Description</td>
 <td>Ticket Quantity</td>
 </tr>";

$con=mysqli_connect("localhost", "root", "","eventwp") or die("Cannot connect to server.".mysqli_error($con));

$sql="SELECT * FROM ticket";

 $result=mysqli_query($con,$sql) or die("Cannot execute sql.");
 
 while($data=mysqli_fetch_array($result,MYSQLI_NUM))

 {
 $tid=$data[0];
 $ttype=$data[1];
 $tprice=$data[2];
 $tdesc=$data[3];
 $tqty=$data[4];

 echo "<tr>
 <td>$tid</td>
 <td>$ttype</td>
 <td>$tprice</td>
 <td>$tdesc</td>
 <td>$tqty</td>
 </tr>";

 }

 echo "</table>";

}

else
 echo "No session exist or session is expired. Please log in again";
 header("refresh:2.0; location:signin.html");
?>


</body>
</html> 