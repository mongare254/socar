<?php
session_start();
require 'dbconnect.php';
require 'logis.php';
if(isset($_POST['cpass'])){
	$password=$_POST['cpass'];
	$newpass =$_POST['npass'];
    $usrname=$_SESSION['username'];
    $passh=md5($password);
    $passn=md5($newpass);
    $sql="SELECT password FROM users WHERE password='$passh' AND staff_reg_no ='$usrname'";
    $result= mysqli_query($conn,$sql);
    $check = mysqli_num_rows($result);
    if ($check == 1){
    	mysqli_query($conn, "UPDATE users set password ='$passn' WHERE staff_reg_no='$usrname'");
        header('Location:changepass.php?successpass?');
    }
    else
        header('Location:changepass.php?successfail?');

}


?>