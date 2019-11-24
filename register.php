
<?php
session_start();
require 'regis.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="#SSS" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="font/css/font-awesome.css" rel="stylesheet" />
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<!-- <link rel="shortcut icon" href="images/asawa.jpg"> -->
	<title>SOCAR-reg</title>
</head>
<body style="background-image: url(img/mu.jpeg);">
	<section>
		<div class="wrap">
			<div class="container">
				<table class ="table">
					<tr><td><p style="font-size: 34px;"><span>S</span>Ocar</p></td></tr>
				</table>
			</div>
		</div>
	</section>
	<div >
		<div class="col-md-12">
			<div class="col-md-6 col-md-offset-3">
				<div 
				class="col-md-10 col-md-offset-1" id='form'>
				<div style="display: inline-block;text-align: center; margin-left: 9%;padding-top: 15px;">
					<?php
  //get the page's url
					$url = "http//:$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

					if(strpos($url, "register.php?failed") == true){
						echo '<div class="alert alert-danger alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>UNABLE TO UPDATE RECORD </strong>
						</div>';
					}
					else if(strpos($url, "register.php?emailadmexist") == true){
						echo '<div class="alert alert-danger alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>ADMISSION NUMBER OR EMAIL ADDDRESS IS TAKEN </strong>
						</div>';
					}
					?>
				</div>
					<form method="POST" action="regis.php" class="form-group">
						<h1 style="text-align:center; color:white;">Student REGISTER</h1>
						<div class="col-md-12">
							<div class=col-md-6 style="margin-top: 20px;">
								<label style="color:black;">Firstname:</label>
							<input type="text" name="firstname" class="form-control" placeholder="Firstname" required>
							</div>
							<div class="col-md-6" style="margin-top: 20px;">
								<label style="color:black;">Secondname:</label>
							<input type="text" name="secondname" class="form-control" placeholder="Secondname"required>
							</div>
						</div>
						<div class="col-md-12">
							<div class=col-md-6>
								<div id=""><p></p></div>
								<label style="color:black;">Email Address:</label>
							<input type="email" name="email" class="form-control" placeholder="Email Address" required>
							</div>
							<div class="col-md-6">
								<div id=""><p></p></div>
								<label style="color:black;">Password:</label>
							<input type="password" name="password" class="form-control" placeholder="Password" id='password'required>
							</div>
						</div>
						<div class="col-md-12">
							<div class=col-md-6>
								<div id="donmach"><p></p></div>
								<label style="color:black;">Confirm Password:</label>
							<input type="password" id='confirm_password' name="confirm_password" class="form-control" placeholder="confirm Password" onmouseout="check();" required>
							</div>
							<div class="col-md-6">
								<div id=""><p></p></div>
								<label style="color:black;">Admission Number:</label>
							<input type="text" name="admno" class="form-control" placeholder="Admission Number"required>
							</div>
						</div>
						<div class="col-md-6 col-md-offset-3" style="margin-top: 15px;">
							<button type="submit" name="regbut" class="btn btn-primary active">REGISTER</button>
						</div>
						<div class="col-md-8 col-md-offset-2" style="margin-top: 20pxs;">
							<a href="">Forgot Password?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" src="js/jquery2.js"></script>
<script type="text/javascript" src="js/bootstra]p.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</html>