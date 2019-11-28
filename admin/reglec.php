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
require 'reglecis.php';

 $resultn = mysqli_query($conn,"SELECT * FROM users WHERE user_type='LECTURER' AND status= 'ACTIVE'" );
 $rows = mysqli_num_rows($resultn);
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
        " class="list-group-item list-group-item-action bg-light">COURSES</a>
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
              <?php
  //get the page's url
          $url = "http//:$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

          if(strpos($url, "reglec.php?success") == true){
            echo '<div class="alert alert-success alert-dismissable" role="alert" style="text-align:center;">
                                            <strong>Lecturer added successfully!</strong> 
                                        </div>';
          }
          else if(strpos($url, "reglec.php?staffnoexists?")==true){
            echo '<div class="alert alert-danger alert-dismissable" role="alert" style="text-align:center;">
                                            <strong>EMAIL OR STAFF NO EXISTS!</strong> 
                                        </div>';
          }
          else if(strpos($url, "reglec.php?failed")==true){
            echo '<div class="alert alert-danger alert-dismissable" role="alert" style="text-align:center;">
                                            <strong>EMAIL OR STAFF NO EXISTS!</strong> 
                                        </div>';
          }
          ?>
             <div class="col-md-8">
          <p><b>ACTIVE LECTURERS:</b> &nbsp; <span style="font-size: 46px; color: green;"><?php echo $rows; ?></span></p>
             <?php 
              if(isset($_GET['editLec'])){
                $id = $_GET['editLec'];
                echo '<form method="POST" name="editlec" action="editlec.php?id='.$id.'">'; 
              }else{
                 echo '<form method="POST" name="reglec" action="reglecis.php">';
              } 
              
             ?>
                <div class="form-group">
                  <label for="firstname">Firstname:</label>
                  <input type="text" class="form-control" name="firstname" required>
                </div>
                <div class="form-group">
                  <label for="thirdname">Lastname:</label>
                  <input type="text" class="form-control" name="lastname" required>
                </div>
                <div class="form-group">
                  <label for="staffno">staff No:</label>
                  <div id="error"><p></p></div>
                  <input type="number" class="form-control" name="staffno" id="staffno" onmouseout="check()" required>
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="text" class="form-control" name="email" required>
                </div>
                <!-- <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" name="password" maxlength="8" minlength="8" requireed>
                </div> -->
                <?php 
                  if(isset($_GET['editLec'])){

                    $lec_id = $_GET['editLec'];
                     echo '<button type="submit" class="btn btn-success" name="editlec" value="register" style="margin-top: 15px;">Change</button>';
                  }else{
                    echo '<button type="submit" class="btn btn-success" name="reglec" value="register" style="margin-top: 15px;">Register</button>';
                  }
                 ?>
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
    <script type="text/javascript" src="js/main.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {//function(e) is the event handling function
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
<script type="text/javascript">
  var check=function () {
 // check if input is bigger than 8
 var value = document.getElementById('staffno').value;
 if (value.length < 8 && value.length>8) {
   document.getElementById('error').style.color = 'green';
   document.getElementById('error').innerHTML = 'Staff number should be 8 digits!!';
 }
else{
  //
}
</script>
</body>

</html>
