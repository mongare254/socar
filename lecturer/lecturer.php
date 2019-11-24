<?php
// ini_set('display errors', 1);
// error_reporting('0');
session_start();
if(!isset($_SESSION['username'])){
  header('Location:../login.php');
}
elseif(isset($_SESSION['username'])){
  $usrname=$_SESSION['username'];
}
require '../logis.php';
require 'gencode.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SOCAR-lec</title>
  <link href="../grid/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../grid/css/sidebar.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-maroon border-right" id="sidebar-wrapper">
      <div class="sidebar-heading" style="text-align: center; color: white;font-size: 28px;display: inline-block;">LECTURER</div>
      <div class="list-group list-group-flush" id="link" style="margin-top: 22px;">
        <a href="index.php" class="list-group-item list-group-item-action bg-success
        ">HOME</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">COURSES</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">PROFILES</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">REPORTS</a>
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
          <ul style="margin-left: 31%;list-style: none;display: block; color: maroon;font-size: 34px;">
            <li>SOCAR</li>
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
              <a class="dropdown-item" href="changepass.php">Change Password</a>
              <a class="dropdown-item" href="../logout.php">Log out</a>
                <!-- <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a> -->
                </div>
              </li>
            </div>
          </nav>
          <div class="container-fluid">
            <div class="pagecontent">
             <div class="alert alert-success">Select Course and generate Attendance code and give it to students to enable them sign attendance</div>
             <div class="alert alert-success">The attendance code can only be generated once in two hours</div>
             <div class="alert alert-success"><a href="">Contact Admin</a> if you teach a course that does not appear below</div>
             <div class="signform">
              <br>
              <div class="inform">
                <form method="POST" action="gencode.php">
                  <div class="form-group">
                    <label>Course</label>
                    <select class="form-control" name='lecorse'>
                <?php 
          require 'lecourse.php';
          foreach($all as $one){
            echo '<option>'.$one['coursecode'].' '.$one['coursetitle'].'</option>';
          }
          ?></select>
              </div>
              <label>Code:</label><br>
              <div style="color:green; font-size: 35px;"><?php if(isset($_GET['code'])){echo $_GET['code'];} ?></div><br>
              <div ><button class="btn-success" value="submit" name="signcode" onmousedown="background-color:black;">Assign Code</button></div>
                  </div>
                </form>'/
                '
             </div> 
           </div>
         </div>
         </div>
       </div>
       <!-- /#page-content-wrapper -->

     </div>
     <!-- /#wrapper -->

     <!-- Bootstrap core JavaScript -->
     <script src="../grid/vendor/jquery/jquery.min.js"></script>
     <script src="../grid/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

     <!-- Menu Toggle Script -->
     <script>
    $("#menu-toggle").click(function(e) {//function(e) is the event handling function
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
