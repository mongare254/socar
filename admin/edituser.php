<?php 

if(isset($_POST['editlec'])){
	require '../dbconnect.php';

	$id = $_GET['id'];
	$firstname = $_POST['firstname'];
	$secondname =$_POST['lastname'];
	$staffno = $_POST['staffno'];
	$email = $_POST['email'];
	$password_1 =$_POST['password'];
	$password=md5($password_1);

	$stmt = "UPDATE users SET firstname = '$firstname', secondname = '$secondname', email = '$email', password = '$password', staff_reg_no = '$staffno' WHERE id = '$id';";
	if(mysqli_query($conn, $stmt)){
		header('Location:admin.php?edit-success');
	}else{
		echo 'error';
	}
}else{
	echo 'outer error';
}