<?php
session_start();
if(isset($_SESSION['email']))
{
?>

<!DOCTYPE html>
<html lang="en">
  
  <head>
    <title>Tommorrowland Admin Panel</title>
    <!-- Main CSS-->
     <link href="css/main.css" rel="stylesheet">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  
  <body class="app sidebar-mini rtl">
   
   <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.php">Admin Panel</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['fname']; ?></p>
          <p class="app-sidebar__user-designation"><?php echo $_SESSION['usertype']; ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a  class="app-menu__item" href="profile.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Profile</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-calendar-check-o"></i><span class="app-menu__label">Appointment</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="createapp.php"><i class="app-menu__icon fa fa-arrow-right"></i> Make an Appointment</a></li>
			 <li><a class="treeview-item" href="searchtimetable.php"><i class="app-menu__icon fa fa-arrow-right"></i> Search Lecturer Timetable</a></li>
            <li><a class="treeview-item" href="cancelappstud.php"><i class="app-menu__icon fa fa-arrow-right"></i> View Cancelled Appointment</a></li>
            <li><a class="treeview-item" href="pendingappstud.php"><i class="app-menu__icon fa fa-arrow-right"></i> View Appointment List</a></li>
          </ul>
        </li>
        <li><a class="app-menu__item" href="historystud.php"><i class="app-menu__icon fa fa-history"></i><span class="app-menu__label">History</span></a></li>
		<li><a class="app-menu__item" href="searchstud.php"><i class="app-menu__icon fa fa-search"></i><span class="app-menu__label">Search</span></a></li>
		<li><a onclick="return clicked();" class="app-menu__item" href="logout.php"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a></li>
      </ul>
    </aside>
	
	 <!-- Essential javascripts for application to work-->
    <script src="localhost/event_wp/test/js/jquery-3.2.1.min.js"></script>
    <script src="localhost/event_wp/test/js/popper.min.js"></script>
    <script src="localhost/event_wp/test/js/bootstrap.min.js"></script>
    <script src="localhost/event_wp/test/js/main.js"></script>
	<script type="text/javascript">
		function clicked() {
		return confirm('Are you sure?');
		}
	</script>

    <!-- The javascript plugin to display page loading on top-->
    <script src="localhost/event_wp/test/js/plugins/pace.min.js"></script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>
<?php
}

else
{
	echo "";
	//header("refresh:1.0; url=signin.html");
  header("refresh:2.0; location:signin.html");

}
?>