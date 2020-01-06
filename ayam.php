 <?php

//echo "aaa";


 $con=mysqli_connect("localhost","root","","eventwp") or die("cannot connect to the server.".mysqli_error($con));

 
$sql="SELECT * FROM ticket";

$result=mysqli_query($con,$sql) or die("cannot execute sql");

while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
{
	$tid=$row[0];
	//echo "aa";
	echo "$tid<br>";


	$sql1="SELECT COUNT(ticket_id) as total FROM user_ticket WHERE ticket_id='$tid'";
 
	$result1=mysqli_query($con,$sql1) or die("cannot execute sql");

	$total = 0;
	while ($row = mysqli_fetch_array($result1, MYSQLI_BOTH)) {
	    $total = $row['total'];
	    $amount=$total + $total;
	    
	    //echo "test";
	    echo  "$total
	    <br>";
	   $amount++;
		
}
?> </br> 
</br>
<?php 





}

echo "total is ";

echo "$amount";


 
?>