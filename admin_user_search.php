 <?php
session_start();
//$_SESSION["usertype"];
if(isset($_SESSION['email']))
{
    //echo "Welcome "; echo $_SESSION['fname'];


 $con=mysqli_connect("localhost","root","","eventwp") or die("cannot connect to the server.".mysqli_error($con));


if(isset($_POST['search_triggered']))
{
    $valueToSearch = $_POST['Search'];
    
    $query = "SELECT * FROM user WHERE CONCAT(`email`, `password`, `fname`, `lame`,'usertype','phoneno','gender') LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tomorrowland Admin</title>
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

    <!--custom JQuery -->
  
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
                <a class="navbar-brand" href="admin.php"> <strong><i class="fa fa-comments"></i> ADMIN </strong></a>
            </div>

            <ul class="nav navbar-top-links navbar-right"> 
                <!-- /.dropdown -->

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i><b>   <?php echo $_SESSION['fname']?></b>   <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
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
                        <a href="#"><i class="fa fa-sitemap"></i> Dashboard<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin.php">Home</a>
                            </li>

                            <li>
                                <a href="ticket.php">Ticket</a>
                            </li>
                            <li>
                                <a href="admin_user_details.php">User</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                   
<?php
                    if(isset($_GET['welcome']))
                      {
                        ?>
                        <div class="alert alert-info alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" area-label="close">&times;</a>
                        <strong>Welcome,</strong> <?php echo $_SESSION['fname']?>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
                        <?php
                      }
                      ?>

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard <small>Summary of your App</small>
                        </h1>
                    </div>
                </div>
                

            
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             User details table

                             <!-- Search function -->
                                                    <div class="row">
                                                            <div class="col-sm-9">
                                                             </div>
                                                            <div class="col-md-3 ">
                                         <form method="POST" action="admin_user_search.php">
                                                     <div align="right" class="form-group input-group">
                                                    
                            <input align="right" type="text" class="form-control" name="search">
                                    <span class="input-group-btn">
                                            <button class="btn btn-default" type="button" value="search_triggered"><i class="fa fa-search"></i>
                                             </button>
                                     </span>
                                </form>
                                 </div>
                             </div>
                            <!-- Search function end -->
                     </div>
                  
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Phone Number</th>
                                            <th>Gender</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php


                                        $con=mysqli_connect("localhost","root","","eventwp") or die("cannot connect to the server.".mysqli_error($con));

                                        $sql="SELECT * FROM user";

                                        $result=mysqli_query($con,$sql) or die("cannot execute sql");

                                        while($data=mysqli_fetch_array($result,MYSQLI_BOTH))
{                                       $email=$data[0];
                                        $pwd=$data[1];
                                        $fname=$data[2];
                                        $lname=$data[3];
                                        $pnum=$data[5];
                                        $gender=$data[6];
?>
                                        <tr class="odd gradeX">
                                            <td> <?php echo "$email"?>

                                            <?php echo "$email"?>

                                            </td>
                                            <td>
                                                <?php echo "$pwd"?>
                                            <td>
                                                <?php echo "$fname"?>

                                            <td>
                                            <?php echo "$lname"?>

                                            <td>
                                                <?php echo "$pnum"?>

                                            <td>
                                                
                                            <?php echo "$gender"?>

                                            </td>

                                            
                                       
                                        </tr>

                                   <?php }
                                    ?>
                                    </tbody>

                             
                                </table>
                                <div align="right">
                           <a href="admin_user_details.php" class="btn btn-default"><i class=" fa fa-refresh "></i>Update</a>
                       </div>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>




                <!-- /. ROW  -->
                <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>


<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  
  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#user_data').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
   update_data(id, column_name, value);
  });
  
  $('#add').click(function(){
   var html = '<tr>';
   html += '<td contenteditable id="data1"></td>';
   html += '<td contenteditable id="data2"></td>';
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
   html += '</tr>';
   $('#user_data tbody').prepend(html);
  });
  
  $(document).on('click', '#insert', function(){
   var first_name = $('#data1').text();
   var last_name = $('#data2').text();
   if(first_name != '' && last_name != '')
   {
    $.ajax({
     url:"insert.php",
     method:"POST",
     data:{first_name:first_name, last_name:last_name},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   else
   {
    alert("Both Fields is required");
   }
  });
  
  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
     url:"delete.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });
 });
</script>









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
{
 echo "No session exist or session is expired. Please log in again";
 header("refresh:2.0; url:../signin.php");
}
 exit();
?> 


</body>

</html>