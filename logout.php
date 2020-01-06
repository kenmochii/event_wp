
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
<span class="txt">Signin' out...</span>
</div>

	<video id="videoBG" autoplay muted loop>
		<source src="assets/vid/Tomorrowland_signout.mp4" type="video/mp4">
		</video>
</body>
</html>




<?php
session_start();

if(isset($_SESSION['email']))
{
	session_destroy();

	header("refresh:4.5; url=signin.php");

}
exit();
?>

