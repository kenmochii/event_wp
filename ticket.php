﻿<?php
session_start();
//$_SESSION["usertype"];
if(isset($_SESSION['email']))
{

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ticket Session</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>

<!-- header --->

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
                <a class="navbar-brand" href="admin.php"><i class="fa fa-comments"></i> <strong>ADMIN</strong></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i><b><?php echo $_SESSION['fname']?></b><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
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



        <!-- /. TABLE  -->


        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                  <!-- Notification pop up -->
                      <?php 
                    if(isset($_GET['success']))
                      { ?>
                    <div class="row">
                    <div class="alert alert-success alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" area-label="close">&times;</a>
                    <strong>Success!</strong> the data has been updated
                    </div>

                    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
                  </div>
                     <?php }

                        ?>

                          <?php 
                    if(isset($_GET['error']))
                      { ?>
                    <div class="row">
                    <div class="alert alert-danger alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" area-label="close">&times;</a>
                    <strong>Error!</strong> the ticket has already exist
                    </div>

                    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
                  </div>
                     <?php }

                        ?>

                        <h1 class="page-header">
                            TICKET <small>Managing event ticket here</small>
                        </h1>
                    </div>
                </div> 

                 <!-- /. ROW  -->
               
            <div class="row">
                <div class="col-md-12">

                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Ticket ID</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Total Quantity Limit</th>
                                            <th>Total Ticket Purchased </th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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

                                        $sql1="SELECT COUNT(ticket_id) as totalpurchased FROM user_ticket WHERE ticket_id='$id'";
 
                                        $result1=mysqli_query($con,$sql1) or die("cannot execute sql");

                                        $totalpurchased = 0;
                                        while ($row = mysqli_fetch_array($result1, MYSQLI_BOTH)) {
                                        $totalpurchased = $row['totalpurchased'];

                                                            ?>
                                        <tr class="odd gradeX">
                                        <form method="POST" action="updateticket.php">
                                            <td> <?php echo "$id"?>

                                            <input type="hidden" name="ticketid" value="<?php echo "$id"?>"/>

                                            </td>
                                            <td>
                                                  <input type="text" name="tickettype" value="<?php echo "$type"?>"/></td>
                                            <td>
                                                <input type="text" name="ticketprice" value="<?php echo "$price"?>"/></td>

                                            <td><textarea name="ticketdesc" maxlength="50"><?php echo "$desc"?></textarea></td>

                                            <td><input type="text" name="ticketqty" value="<?php echo "$qty"?>"/></td>
                                             
                                             <td> <?php echo "$totalpurchased"?>

                                            </td>


                                            <td>


                                                <button class="btn btn-default"><i class=" fa fa-refresh "></i>Update</button> 

                                                <a href="deleteticket.php?ticketid=<?php echo "$id"?>" class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</a>

                                            </td>
                                        </form>
                                        </tr>
                                       <?php }}
                                    ?>
                                    </tbody>

                                </table>
                           
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                    
                    <div align="right">
     <button type="button" name="addticket" id="addtic" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success">Add</button>
    </div>
                </div>
            </div>
            
                <!-- /. ROW  -->
        </div>
               <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
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




<!-- ADD TICKET MODAL FUNCTION AND JQUERY -->

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><b>Add New Event Ticket</b></h4>
   </div>
   <div class="modal-body">
    <form method="POST" id="insert_form" action="addticket.php">
     <label>Ticket ID</label>
     <input type="text" name="tid" id="tid" class="form-control" />
     <br />
     <label>Type</label>
     <input type="text" name="ttype" id="ttype" class="form-control">
     <br />
     <label>Price</label>
     <input type="text" name="tprice" id="tprice" class="form-control">
     <br /> 
     <label>Description</label>
     <textarea maxlength="50" name="tdesc" id="tdesc" class="form-control"/></textarea>
     <br />  
     <label>Quantity</label>
     <input type="text" name="tqty" id="tqty" class="form-control" />
     <br />
     <input type="submit" name="insert" id="insert" value="Submit" class="btn btn-success" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Employee Details</h4>
   </div>
   <div class="modal-body" id="ticket_detail">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<script>  
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#tid').val() == "")  
  {  
   alert("Ticket ID is required");  
  }  
  else if($('#ttype').val() == '')  
  {  
   alert("Ticket Type is required");  
  }  
  else if($('#tprice').val() == '')
  {  
   alert("Ticket Price is required");  
  }
  else if($('#tdesc').val() == '')
  {  
   alert("Ticket Description is required");  
  }
  else if($('#tqty').val() == '')
  {  
   alert("Ticket Quantity is required");  
  }

   
  else  
  {  
   $.ajax({  
    url:"addticket.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     //$('#employee_table').html(data);  
    }  
   });  
  }  
 }); 
 </script>