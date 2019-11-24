<?php
ini_set('display errors', 1);
error_reporting('0');
session_start();
if(!isset($_SESSION['username'])){
  header('Location:../login.php');
}
elseif(isset($_SESSION['username'])){
  $usrname=$_SESSION['username'];
}
require '../logis.php';
require 'adcorse.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SOCAR-admin</title>
  <link href="../grid/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../grid/css/sidebar.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-maroon border-right" id="sidebar-wrapper">
      <div class="sidebar-heading" style="text-align: center; color: white;font-size: 28px;display: inline-block;">ADMINSTRATOR</div>
      <div class="list-group list-group-flush" id="link" style="margin-top: 22px;">
        <a href="admin.php" class="list-group-item list-group-item-action bg-success
        ">HOME</a>
        <a href="reglec.php" class="list-group-item list-group-item-action bg-light">LECTURERS</a>
        <a href="regcourse.php
        " class="list-group-item list-group-item-action bg-light dropdown-btn">COURSES<i class="fa fa-caret-down"></i>
      </a>
      <a href="program.php" class="list-group-item list-group-item-action bg-light">PROGRAMMES</a>
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
              <a class="dropdown-item" href="../pass.php">Change Password</a>
              <a class="dropdown-item" href="../logout.php">Log out</a>
                <!-- <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a> -->
                </div>
              </li>
            </div>
          </nav>
          <div class="container-fluid">
            <div style="margin-left: 30%; margin-right: 10%; margin-top: 4%;">
              <div class="col-md-8">
                <?php
  //get the page's url
          $url = "http//:$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

          if(strpos($url, "regcourse.php?success") == true){
            echo '<div class="alert alert-success left-icon-alert" role="alert" style="text-align:center;">
                                            <strong>Course added successfully!</strong> 
                                        </div>';
          }
          else if(strpos($url, "regcourse.php?exists")==true){
            echo '<div class="alert alert-danger left-icon-alert" role="alert" style="text-align:center;">
                                            <strong>COURSE EXISTS!</strong> 
                                        </div>';
          }
          ?>
                <form method="POST" action="adcorse.php">
                  <div class="form-group">
                    <label >Course Code:</label>
                    <input type="text" class="form-control" name="cc" required>
                  </div>
                  <div class="form-group">
                    <label>Course Title:</label>
                    <input type="text" class="form-control" name="ct" required>
                  </div>
                  <div class="form-group">
                    <label>Lecturer</label>
                    <select class="form-control" name='lecturer'>
                      <option name="1"><?php include 'getlecture.php'; ?></option></select>
                    </div>
                    <div class="form-group">
                     <div class="form-group">
                      <label >Year:</label>
                      <select name="year" class="form-control" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                    </div>
                    <div class="form-group" >
                      <label >Semester:</label>
                      <select name="sem" class="form-control">
                        <option value="1"> 1</option>
                        <option value="2"> 2</option>
                        <option value=3> 3</option>
                      </select>
                      <button type="submit" class="btn btn-success" name="adcors" style="margin-top: 13px;">Register</button>
                    </form>

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
