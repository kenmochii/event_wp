<!DOCTYPE html>
<html>
<body>
<?php
 echo "<table border='1'><tr>
 <td>Customer ID</td>
 <td>Customer Name</td>
 <td>Customer Address</td>
 </tr>";
$con=mysqli_connect("localhost", "root", "","mylab2019") or die("Cannot connect to server.".mysqli_error($con));
 $id=@$_POST["Id"];
 $name=@$_POST["Name"];
 $email=@$_POST["Email"];

 $sql="SELECT * FROM participant WHERE Id LIKE '%$id%'
 AND Name LIKE '%$name%' AND Email LIKE '%$email%' ";

 $result=mysqli_query($con,$sql) or die("Cannot execute sql.");
 
 while($row=mysqli_fetch_array($result,MYSQLI_NUM))
 {
 $idCustomer=$row[0];
 $name=$row[1];
 $address=$row[2];

 echo "<tr>
 <td>$idCustomer</td>
 <td>$name</td>
 <td>$address</td>
 </tr>";
 }
 echo "</table>";
?>
</body>
</html> 