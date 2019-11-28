<?php
// connect to the database
require '../dbconnect.php';

// REGISTER USER
if (isset($_POST['reglec'])) {
	$firstname = $_POST['firstname'];
	$secondname =$_POST['lastname'];
	$staffno = $_POST['staffno'];
	$email = $_POST['email'];
	$password_1 ="password";
	$password=md5($password_1);
$check="SELECT * FROM users WHERE email = '$email' OR staff_reg_no='staffno' ";
$check_select = mysqli_query($conn,$check); 

if($check_select){
	$numrows=mysqli_num_rows($check_select);
	if ($numrows ==0){
	$sql = "INSERT INTO users (id,firstname,secondname, email,password,staff_reg_no,course,user_type,status)
VALUES ('', '$firstname', '$secondname','$email','$password','$staffno','0','LECTURER','ACTIVE')";
if ($conn->query($sql) === TRUE) {
    header('Location:reglec.php?success');
}
else{
    header('Location:reglec.php?staffnoexists?');
}
}
 else {
    header('Location:reglec.php?failed');
}

$conn->close();
}
}
?>