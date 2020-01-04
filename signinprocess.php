<!DOCTYPE HTML>
<html>
<head>

</head>
<body>

<?php

	$con=mysqli_connect("localhost", "root", "","eventwp") or die("Cannot connect to server");

	$email=@$_POST["email"];
	$password=@$_POST["password"];

	$sql="SELECT * FROM user WHERE email='$email'";
	$result=mysqli_query($con,$sql);

	if(!$result)
	{
		die ("Invalid Query 1: ".mysqli_error($sql));
	}
	
	else
	{
		if(mysqli_num_rows($result)==0)
		{
			echo 'User ID does not exist';
			header("refresh:1.5; url=signin.html");
			
		}
	
		else
		{
			$row = mysqli_fetch_array($result, MYSQLI_BOTH);
			if($row["password"] == $password)
			{
				if($row['usertype']=='admin')
				{
					session_start();
					$_SESSION["email"] = $email;
					$fname = $row['fname'];
					$usertype = $row['usertype'];
					$_SESSION["fname"] = $fname;
					$_SESSION["usertype"] = $usertype;
					header("Location:/event_wp/test/index.php");
				}
			
				elseif($row['usertype']=='user')
				{
					session_start();
					$_SESSION["email"] = $email;
					$fname = $row['fname'];
					$usertype = $row['usertype'];
					$_SESSION["fname"] = $fname;
					$_SESSION["usertype"] = $usertype;
					header("Location:/event_wp/test/index.php");
				}
				
				else
				{
					session_start();
					$_SESSION["email"] = $email;
					$fname = $row['fname'];
					$usertype = $row['usertype'];
					$_SESSION["fname"] = $fname;
					$_SESSION["usertype"] = $usertype;
					header("Location:signin.php");
				}
			}
		
			else
			{
				echo 'Password is incorrect';
				header("refresh:1.5; url=signin.html");
			}
		}		
	}

?>
</body>
</html>