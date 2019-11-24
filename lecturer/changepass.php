
<?php
ini_set('display errors', 1);
error_reporting('0');
session_start();
if(!isset($_SESSION['username'])){
	header('Location:login.php');
}
elseif(isset($_SESSION['username'])){
	$usrname=$_SESSION['username'];
}
require '../logis.php';

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
              <a class="dropdown-item" href="changepass.php">Change Password</a>
              <a class="dropdown-item" href="../logout.php">Log out</a>
                <!-- <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a> -->
                </div>
              </li>
            </div>
			</nav>
			<div class="container-fluid">
				<div style="margin-left:150px; margin-top: 60px;">
					<h2 style="color: green; font-size: 36px; margin-left: 55px; text-decoration: underline;" >Change Password</h2>
					<div class="col-md-8 col-offset-2">
						<?php
  //get the page's url
          $url = "http//:$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

          if(strpos($url, "changepass.php?successpass?") == true){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center;">
                                            <strong>Password changed successfully!!</strong> 
                                        </div>';
          }
          else if(strpos($url, "changepass.php?successfail?")==true){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align:center;">
                                            <strong>UNSUCCESSFUL! ENTER CORRECT PASSWORD!</strong> 
                                        </div>';
          }
          ?>
						<div style="border-radius: 10%; border:5px solid skyblue; background-color: azure; ">
							<form action="pass.php" method="POST" class="form-group" style="padding: 30px;" >
								<label>Current Password:</label>
								<input type="password" name="cpass" placeholder="Current Password" class="form-control"required>
								<label>New Password:</label>
								<input type="password" id="npass" name="npass" placeholder="New Password" class="form-control" required>
								<div class="col-md-6 col-md-offset-3"><p id="donmach"></p></div>
								<label>Confirm Password:</label>
								<input type="password" id="cnpass"name="cnpass" placeholder="Confirm Password" class="form-control" onmouseout="check()" required>
								<div class="col-md-6 col-md-offset-3" style="margin-top: 15px;">
							<button type="submit" name="cypass" class="btn btn-primary">CHANGE PASSWORD</button>
						</div>
							</form>
						</div>
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
      var check = function() {
  if (document.getElementById('npass').value ==
    document.getElementById('cnpass').value) {
    // document.getElementById('message').style.color = 'green';
    // document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('donmach').style.color = 'red';
    document.getElementById('donmach').innerHTML = 'The passwords do not match!!';
  }
}
</script>

</body>

</html>
