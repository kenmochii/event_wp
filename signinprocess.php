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
			header("refresh:3; url=signin.php?error=user doesn't exist");
			
		}
	
		else
		{
			$row = mysqli_fetch_array($result, MYSQLI_BOTH);
			if($row["password"] == $password)
			{
				if($row['usertype']=='Admin')
				{
					session_start();
					$_SESSION["email"] = $email;
					$fname = $row['fname'];
					$usertype = $row['usertype'];
					$_SESSION["fname"] = $fname;
					$_SESSION["usertype"] = $usertype;
					header("refresh:3.8; url=admin.php?welcome=");
				}
			
				else if($row['usertype']=='User')
				{
					session_start();
					$_SESSION["email"] = $email;
					$fname = $row['fname'];
					$usertype = $row['usertype'];
					$_SESSION["fname"] = $fname;
					$_SESSION["usertype"] = $usertype;
					header("refresh:3.8; url=user.php?welcome=");
				}
				
				//else
				//{
				//	session_start();
				//	$_SESSION["email"] = $email;
				//	$fname = $row['fname'];
				//	$usertype = $row['usertype'];
				//	$_SESSION["fname"] = $fname;
				//	$_SESSION["usertype"] = $usertype;
				//	header("Location:signin.html");
				//}
			}
		
			else
			{
				header("refresh:3; url=signin.php?error2=incorrect password");
			}
		}		
	}


mysqli_close($con);

?>
</body>
</html>


<!-- Animation part -->
<html>
<head>
	 <link href="assets/css/font-awesome.css" rel="stylesheet" />
	 <link href="assets/css/loading.css" rel="stylesheet" />

	</head>
<body>


	<div class="loader">   
	<span class="box"></span>   
	<span class="box"></span>  
<div class="code"> 
<img src="assets/img/no_background.png" width="120px">
</div>    
<span class="txt">Signin' in...</span>
</div>

	<video id="videoBG" autoplay muted loop>
		<source src="assets/vid/Tomorrowland_signin.mp4" type="video/mp4">
		</video>
</body>
</html>