<?php
session_start();
//$_SESSION["usertype"];
if(isset($_SESSION['email']))
{
    //echo "Welcome "; echo $_SESSION['fname'];
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
                        <a class="navbar-brand" href="user.php" align="center"> <strong>Tomorrowland</strong></a>
                      
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

                                        <a href="event.php"><i class="fa fa-qrcode"></i>Buy Ticket</a>
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
                                    Tomorrowland Ticket 
                                </h1>
                            </div>
                        </div>
                        
                        
                        <!-- /. ROW  -->
                    
                <!--/.row-->
 <div class="row">
                    <?php


                    $con=mysqli_connect("localhost","root","","eventwp") or die("cannot connect to the server.".mysqli_error($con));

                    $sql="SELECT * FROM ticket";

                    $result=mysqli_query($con,$sql) or die("cannot execute sql");

                    while($data=mysqli_fetch_array($result,MYSQLI_BOTH))
                    {               
                     $id=$data[0];
                     $type=$data[1];
                     $price=$data[2];
                     $desc=$data[3];
                     $qty=$data[4];

                     ?>
                       <form method="post" action="buy.php">
                            <div class="col-md-4 col-sm-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Ticket #<?php echo "$id"?>
                                        <input type="hidden" class="form-control" name="tid" value=<?php echo "$id"?>>
                                    </div>

                                    <div class="panel-body">
                                        <div class="list-group">
                                            <h3>Type</h3>
                                            <p><?php echo "$type"?></p>
                                        </div>
                                        <div class="list-group">
                                            <h3>Price</h3>
                                            <p>RM<?php echo "$price"?></p>
                                        </div>
                                        <div class="list-group">
                                            <h3>Description</h3>
                                            <p><?php echo "$desc"?></p>
                                        </div>

                                        <br>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-default">Buy</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                       </form>
                <?php 
                    
                    }
                    ?>
                     </div>
                        <!-- /. ROW  -->
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
 header("refresh:2.0; url:../signin.php");
?> 
</body>

</html>