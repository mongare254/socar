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
require 'getcourse.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SOCAR-regcourses</title>
  <link href="grid/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="grid/css/sidebar.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <style type="text/css">
  table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
  }
</style>
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-maroon border-right" id="sidebar-wrapper">
      <div class="sidebar-heading" style="text-align: center; color: white;font-size: 34px;">OCAR</div>
      <div class="list-group list-group-flush" id="link">
        <a href="index.php" class="list-group-item list-group-item-action bg-success
        ">HOME</a>
        <a href="courses.php" class="list-group-item list-group-item-action bg-light">COURSES</a>
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
          <ul style="margin-left: 40%;list-style: none;display: block; color: maroon;font-size: 34px;">
            <li>OCAR-register courses</li>
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
        <div style="margin-top: 7%;margin-right:10%; margin-left: 20%;">
          <?php
  //get the page's url
          $url = "http//:$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

          if(strpos($url, "courses.php?success") == true){
            echo '<div class="alert alert-success left-icon-alert" role="alert" style="text-align:center;">
                                            <strong>Course added successfully!</strong> 
                                        </div>';
          }
          else if(strpos($url, "courses.php?failed")==true){
            echo '<div class="alert alert-danger left-icon-alert" role="alert" style="text-align:center;">
                                            <strong>YOU AREALREADY REGISTERED</strong> 
                                        </div>';
          }
          ?>
          <h1 style="color:green; font-size: 45px;opacity:0.8;">COURSES REGISTRATION</h1>
          <marquee style="color: green"><a href="index.php">Sign attendance here </a>For courses you have registered</marquee>
          <div class="alert alert-info" role="alert">
           If Your course does not appear in the list please email the course details to adminsocar@gmail.com
         </div>
         <div style="border:2px solid skyblue;">
           <form method="POST" action="regcourse.php" style="padding: 10px;">
            <div class="col-md-10 col-md-offset-1">
              <label style="color:black;">COURSE:</label>
              <select class="form-control" name='course'>
                <?php 
                foreach($all as $one){
                  echo '<option>'.$one['coursecode'].' '.$one['coursetitle'].'</option>';
                }
                ?></select>
              </div>
              <div class="col-md-10 col-md-offset-1" style="margin-top: 15px;">
                <button type="submit" name="regcos" class="btn btn-success active">REGISTER</button>
              </div>
              <div class="col-md-10 col-md-offset-1">
                <p style="color:maroon;">NB: Please confirm the courses you are taking before registering for them</p>
                <?php
                require ('dbconnect.php');
                $admno = $_SESSION['username'];
  $query = "SELECT coursecode, coursetitle FROM course_reg WHERE admno = '$admno'"; 
  $result = mysqli_query($conn,$query);

echo "<table border=''>"; // start a table tag in the HTML
echo "<tr><th>"."coursecode". "</th><th>"."CourseTitle"."</th><th>".""."</th></tr>";
while($row = mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['coursecode'] . "</td><td>" . $row['coursetitle'] . "</td>";

echo '<td><a href="delete.php?cc=' . $row['coursecode'] . '">Delete</a></td>';
echo "<tr>";
}

echo "</table>"; //Close the table in HTML


?>
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
