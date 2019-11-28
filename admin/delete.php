<?php

// connect to the database
// require '../dbconnect.php';
include 'getlect.php';
include 'getstud.php';
$servername = "localhost";
$username = "root";
$password = "";
$db= 'socar';

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// confirm that the 'id' variable has been set
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
// get the 'id' variable from the URL
$id = $_GET['id'];
$stmt = "DELETE FROM users WHERE id = '$id'";
if(mysqli_query($conn, $stmt)){
		// redirect user after delete is successful
		header("Location: admin.php?success");
}
else{
	echo 'Error';
}

}
else
// if the 'id' variable isn't set, redirect the user
{
header("Location: admin.php?failed");
}

?>