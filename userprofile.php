 <?php
session_start();
//$_SESSION["usertype"];
if(isset($_SESSION['email']))
{
   


 $con=mysqli_connect("localhost","root","","eventwp") or die("cannot connect to the server.".mysqli_error($con));

$id=$_SESSION['email'];

$sql="SELECT * FROM user WHERE email LIKE '%$id%'";

$result=mysqli_query($con,$sql) or die("cannot execute sql");

 $data=mysqli_fetch_array($result,MYSQLI_BOTH);
    $email=$data[0];
    $pwd=$data[1];
    $fname=$data[2];
    $lname=$data[3];
    $pnum=$data[5];
    $gender=$data[6];




?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Tomorrowland User</title>
            <!-- Bootstrap Styles-->
            <link href="assets/css/bootstrap.css" rel="stylesheet" />
            <!-- FontAwesome Styles-->
            <link href="assets/css/font-awesome.css" rel="stylesheet" />
            <!-- Morris Chart Styles-->
            <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
            <!-- Custom Styles-->
            <link href="assets/css/custom-styles.css" rel="stylesheet" />
            <!-- Google Fonts-->
            <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        </head>
        <body>
            <div id="wrapper">
                <nav class="navbar navbar-default top-navbar" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand" href="index.html"> <strong><i class="fa fa-comments"></i><?php echo $_SESSION['fname'];?> </strong></a>
                      

                    </div>

                    <ul class="nav navbar-top-links navbar-right"> 
                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i><b>   <?php echo $_SESSION['fname']?></b>   <i class="fa fa-caret-down"></i>
                    </a>
                            <ul class="dropdown-menu dropdown-user">
                               <li><a href="userprofile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->
                    </ul>
                </nav>
               
                <!--/. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul class="nav" id="main-menu">

                            <li>
                                
                                    <li>
                                        <a href="user.php"><i class="fa fa-fw fa-file"></i>My Ticket</a>
                                    </li>

                                    <li>

                                        <a href="event.php"><i class="fa fa-qrcode"></i>Event</a>
                                    </li>
                                
                            </li>
                        </ul>

                    </div>

                </nav>
                <!-- /. NAV SIDE  -->
                <div id="page-wrapper">
                    <div id="page-inner">
                                     <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            User Profile
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Your Details Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="POST" action="updateprofile.php">
                                        <div class="form-group">
                                            <label>Email cannot be update. Please contact support for to change email.</label>
                                            <br>
                                            <input type="hidden" class="form-control" name="e_email" value=<?php echo "$email"?>>
                                             <input  disabled class="form-control"  value=<?php echo "$email"?>>

                                        </div>
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" name="f_fname" value=<?php echo "$fname"?>>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" name="l_lname" value=<?php echo "$lname"?>>
                                        </div>
                                           
                                         <div class="form-group">
                                            <label>Phone Number</label>
                                            <input class="form-control" name="p_pnum" value=<?php echo "$pnum"?>>
                                        </div>
                                    
                                    <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control" name="g_gender">
                                                <option selected> <?php echo "$gender"?> </option>
                                                <option value = "male">male</option>
                                                <option value = "female">female</option>
                                               
                                            </select>
                                            <br>

                                        <button type="submit" class="btn btn-default">Update</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
                        </div>
                        <!-- /. ROW  -->
                        <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
                    </div>
                    <!-- /. PAGE INNER  -->
                </div>
                <!-- /. PAGE WRAPPER  -->
            </div>
            <!-- /. WRAPPER  -->
            <!-- JS Scripts-->
            <!-- jQuery Js -->
            <script src="assets/js/jquery-1.10.2.js"></script>
            <!-- Bootstrap Js -->
            <script src="assets/js/bootstrap.min.js"></script>
             
            <!-- Metis Menu Js -->
            <script src="assets/js/jquery.metisMenu.js"></script>
            <!-- Morris Chart Js -->
            <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
            <script src="assets/js/morris/morris.js"></script>
            
            
            <script src="assets/js/easypiechart.js"></script>
            <script src="assets/js/easypiechart-data.js"></script>
            
            
            <!-- Custom Js -->
            <script src="assets/js/custom-scripts.js"></script>

        <?php //put right before close </body> tag

}
    

else
 echo "No session exist or session is expired. Please log in again";
 header("refresh:2.0; url:../signin.html");
?> 
</body>

</html>