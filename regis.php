<?php
require 'dbconnect.php';
if(isset($_POST['regbut'])){
	$firstname=strtoupper($_POST['firstname']);
	$secondname =strtoupper($_POST['secondname']);
	$email=$_POST['email'];
	$password1=$_POST['password'];
	$admno=strtoupper($_POST['admno']);
	$password=md5($password1);
    $course = $_POST['admno'];
    $partsfullname = explode('/', $course);
    $coursetitle=$partsfullname[0];
            
	$check_email = $conn->query("SELECT email, staff_reg_no FROM users WHERE email='$email' OR staff_reg_no='$admno'");
	$count=$check_email->num_rows;

	if($count==0){
		
		
		$sql = "INSERT INTO users (id,firstname, secondname, email,password,staff_reg_no,course,user_type)VALUES ('', '$firstname', '$secondname','$email','$password','$admno','$coursetitle','STUDENT')";
		if ($conn->query($sql) === TRUE) {
			header('Location:login.php');
		} else {
			header('Location:register.php?failed');

		}
	
	}
	else{
		header('Location:register.php?emailadmexists?');
	}
}
	$conn->close();
	?>