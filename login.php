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
	<title>SOCAR-login</title>

</head>
<body style="background-image: url(img/mu.jpeg);">
	<section>
		<div class="wrap">
			<div class="container">
				<table class ="table">
					<tr><td><p style="font-size: 34px; color: green; text-shadow: 34px;"><span>S</span>Ocar</p></td></tr>
				</table>
			</div>
		</div>
	</section>
	<div >
		<div class="col-md-12">
			<div class="col-md-6 col-md-offset-3">
				<div class="col-md-10 col-md-offset-1" id='form'>
					<div style="display: inline-block;text-align: center; margin-left: 13%;padding-top: 15px;">
						<?php
  //get the page's url
						$url = "http//:$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

						if(strpos($url, "login=FAIL") == true){
							echo '<div class="alert alert-danger alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>INVALID CREDENTIALS! RETRY!!</strong>
							</div>';
						}
						?>
					</div>
					<form method="POST" action="logis.php" class="form-group">
						<h1 style="text-align:center; color:white;">LOGIN</h1>
						<div class="col-md-8 col-md-offset-2">
							
							<i class="glyphicon glyphicon-user"><div class="inner-addon left-addon"></div></i>
							<label style="color:black;">Email Address:</label>
							<input type="text" name="email" class="form-control" placeholder="Email address" required>
						</div>
						<div class="col-md-8 col-md-offset-2" style="margin-top: 8px;">
							
							<i class="glyphicon glyphicon-lock"><div class="inner-addon left-addon"></div></i>
								<label style="color:black;">Password:</label>
								<input type="password" name="password" class="form-control" placeholder="Password" required>
							</div>
							<div class="col-md-6 col-md-offset-3" style="margin-top: 15px;">
								<button type="submit" name="logbut" class="btn btn-success active">LOGIN</button>
							</div>
							<div class="col-md-8 col-md-offset-2" style="padding-bottom: 25px;">
								<p>New login? <a href="register.php">Create Account..</a></p>
								<a href="">Forgot Password</a>
							</div>
						</form>
					</div>
					<div class="col-md-8 col-md-offset-2" style="text-align: center;margin-top: 6px;">
						<p><b>&copy;&nbsp;<?php echo date('Y'); ?> All Rights Reserved</b></p>
						<p style="color:white; margin-top: 0;font-size: 20px;">----------------------------------------</p>
						<p><span class="brandy">Nisisi Technologies</span></p>
						<p style="color:white; margin-top: 0;font-size: 20px;">----------------------------------------</p>
					</div>
				</div>

			</div>
		</div>
	</body>
	<script type="text/javascript" src="js/jquery2.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	</html>