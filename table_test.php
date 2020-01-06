<html>
<head> 


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
</head>
<body>                   

        <!-- /. TABLE  -->


        <div id="page-wrapper" >
            <div id="page-inner">
             <div class="row">
                    <div class="col-md-12">
                      <?php 

                    if(isset($_GET['update']))
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
                        <h1 class="page-header">
                            USER <small>Managing registered user here</small>
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
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Phone Number</th>
                                            <th>Gender</th>
                                            <th>Manage</th>
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
                                        <form method="POST" action="update.php">
                                            <td> <?php echo "$email"?>

                                            <input type="hidden" name="e_email" value="<?php echo "$email"?>"/>

                                            </td>
                                            <td>
                                                  <input type="text" name="p_pwd" value="<?php echo "$pwd"?>"/></td>
                                            <td>
                                                <input type="text" name="f_fname" value="<?php echo "$fname"?>"/></td>

                                            <td><input type="text" name="l_lname" value="<?php echo "$lname"?>"/></td>

                                            <td><input type="text" name="p_num" value="<?php echo "$pnum"?>"/></td>

                                            <td><select name="g_gender">
                                                
                                            <option selected> <?php echo "$gender"?> </option>
                                                <option value = "male">male</option>
                                                <option value = "female">female</option>

                                            </td>

                                            
                                            <td>

                                                <button class="btn btn-default"><i class=" fa fa-refresh "></i>Update</button> 

                                                <a href="delete.php?e_email=<?php echo "$email"?>" class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</a>

                                            </td>
                                        </form>
                                        </tr>
                                   <?php }
                                    ?>
                                    </tbody>

                                </table>
                           
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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

</body>
</html>