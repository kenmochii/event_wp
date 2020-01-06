<?php
session_start();
//$_SESSION["usertype"];
if(!isset($_SESSION['email']))
{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- color code:  ff6600  -->
  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log In - Tomorrowland Kedah</title>
  
   <!-- Icons font CSS-->
    <link href="plugins/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="plugins/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

      <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />

      <!-- Bootstrap Styles-->
   <link href="assets/css/bootstrap.css" rel="stylesheet" /> 

  <link href="css/style.css" rel="stylesheet">
  
   <!-- Vendor CSS-->
    <link href="plugins/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="plugins/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

  <!-- FAVICON -->
  <link href="images/favicon.png" rel="shortcut icon">
  
</head>
<body class="body-wrapper">

<nav >
     <ul>
     <li align ='center'> <!-- logo -->
      <a href="index.php">
        <img src="images/logotomorrow.png" alt="logo">
      </a>
  </li>
    </ul>
  
</nav>
	<div class="page-wrapper bg-banner-one p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                    <?php 

                    if(isset($_GET['error']))
                      { ?>
                    <div class="row row-space">
                    <div class="alert alert-danger danger-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" area-label="close">&times;</a>
                    <strong>Error!</strong> your email/password is incorrect.
                    </div>

                    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

                      </div>
                     <?php }
                     

                     if(isset($_GET['error2']))
                      { ?>
                    <div class="row row-space">
                    <div class="alert alert-danger danger-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" area-label="close">&times;</a>
                    <strong>Error!</strong> incorrect password.
                    </div>

                    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

                      </div>
                     <?php }
                     ?>

                <div class="card-body">
                    <h2 class="title">Log In Form</h2>
                    <form method="POST" name="register" action="signinprocess.php">
                        <div class="row row-space">
                            <div class="col-3">
                                <div class=""> <!-- "input-group" -->
                                    <label class="">Email</label>  <!-- "label" -->
                                    <input class="input--style-4" type="text" name="email" required>
                                </div>
                            </div>
                        </div>
                      </br>
                        <div class="row row-space">
                            <div class="col-3">
                                <div class=""> <!-- "input-group" -->
                                    <label class="">Password</label> <!-- "label" -->
                                    <input class="input--style-4" type="password" name="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn-main-md" type="submit">Submit</button>
                            <button href="index.php" class="btn btn-main-md" type="reset">Cancel</button>

                        </div>

                        <br>
                            <a href="register.html"> Don't have an account? Click here to register</a>
                    </form>
                </div>
            </div>
          </div>
        </div>
    </div>
    

    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>

     <!-- Jquery JS-->
    <script src="plugins/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="plugins/vendor/select2/select2.min.js"></script>
    <script src="plugins/vendor/datepicker/moment.min.js"></script>
    <script src="plugins/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/custom.js"></script>
	</body>
	</html>

     <?php //put right before close </body> tag
}

else
{
 session_destroy();
 echo "Session already exist and you're trying to reach sign in page again then now you're will be sign out. Please log in again.";
 header("refresh:2.0; url=signin.php");

}
exit();
?> 