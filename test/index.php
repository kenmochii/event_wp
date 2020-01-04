<?php
//session_start();
//include 'localhost/event_wp/test/navpanel.php';
include 'navpanel.php';
?>

<!DOCTYPE html>
<html>

<head>
	<title>Test Menu</title>
</head>
<body>
	<?php
//call this function to check if session is exists or not
$_SESSION["usertype"];
if(isset($_SESSION['email']))
{
	echo "Welcome "; echo $_SESSION['fname'];
?> 



	<div align="center">
		<h3>Menu to Test</h3>
		<button name="insert" type="button" onclick="location.href='insert.html'">Insert</button>
		<button name="view" type="button" onclick="location.href='view.php'">View</button>
		<button name="search" type="button" onclick="location.href='search.html'">Search</button>
	</div>



<?php //put right before close </body> tag
}

else
 echo "No session exist or session is expired. Please log in again";
//header("refresh:2.0; url=localhost/event_wp/signin.html");
 //header("refresh:2.0; location:signin.html");
?> 
</body>
</html>