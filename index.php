<?php
ini_set('display errors', 1);
error_reporting('0');
session_start();
if(!isset($_SESSION['username'])){
  header('Location:login.php');
}
elseif(isset($_SESSION['username'])){
  $usrname=$_SESSION['username'];
  $cdone=$_SESSION['course'];
}
require 'logis.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SOCAR-index</title>
  <link href="grid/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="grid/css/sidebar.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-maroon border-right" id="sidebar-wrapper">
      <div class="sidebar-heading" style="text-align: center; color: white;font-size: 34px;">STUDENT</div>
      <div class="list-group list-group-flush" id="link">
        <button class="list-group-item list-group-item-action bg-success
        " id ="dropdown"> <a href="index.php">HOME</a></button>
        <button  class="list-group-item list-group-item-action bg-light"><a href="courses.php">COURSES</a></button>
        <button  class="list-group-item list-group-item-action bg-light"><a href="#">PROFILES</a></button>
        <button  class="list-group-item list-group-item-action bg-light"><a href="#">REPORTS</a></button>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-maroon bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul style="margin-left: 40%;list-style: none;display: block; color: maroon;font-size: 34px;">
            <li>OCAR</li>
          </ul>
        </div>
        <div>
          <a href="#" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-user">USER:</span><?php echo $usrname;?>
        </a>
        </div>
        <div style="margin-left: 4%;">
          <li class="nav-item dropdown" style="list-style: none;">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Utilities
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="pass.php">Change Password</a>
                <a class="dropdown-item" href="logout.php">Log out</a>
                <!-- <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a> -->
              </div>
            </li>
        </div>
      </nav>
      <div class="container-fluid">
        <div style="margin-top: 4%;margin-right:10%; margin-left: 20%; width:50%;">
          <h3>PROGRAMME: <span style="color:green;"><?php echo $cdone;?></span></h3>
          <h1 style="color:blue; font-size: 45px;opacity:0.8;text-decoration:underline;">ATTENDANCE SIGNING</h1>
          <marquee style="color: green"><a href="courses.php">Register here </a>For courses before signing the class attendance</marquee>
          <div class="alert alert-info" role="alert" style="margin-top: 4%;margin-right:10%; ">
           If You have registered for a course and it does not appear in the options below kindly email your student details to adminsocar@gmail.com
          </div>
         <div style="border:2px solid skyblue; ">
          <form method="POST" action="#"  style="padding: 20px 0 32px 4rem;">
            <div class="col-md-8 col-md-offset-2">
              <label style="color:black;">COURSE NAME:</label>
               <select class="form-control" name='course'>
          <?php 
          require 'signcourses.php';
          foreach($courses as $one){
            echo '<option>'.$one['coursecode'].' '.$one['coursetitle'].'</option>';
          }
          ?></select>
            </div>
            <div class="col-md-8 col-md-offset-2">
              <label style="color:black;">CODE:</label>
             
            </div>
            <div class="col-md-6 col-md-offset-3" style="margin-top: 15px;">
              <button type="submit" name="logbut" class="btn btn-success active">SIGN ATTENDANCE</button>
            </div>
          </form>
        </div>
        </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="grid/vendor/jquery/jquery.min.js"></script>
  <script src="grid/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {//function(e) is the event handling function
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
