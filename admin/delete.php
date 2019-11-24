<?php

// connect to the database
// require '../dbconnect.php';
include 'getlect.php';

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

// delete record from database
// if ($stmt = $conn->prepare("DELETE * FROM users WHERE id =?"))
// {
// $stmt->bind_param("i",$id);
// $stmt->execute();
// $stmt->close();
// }
// else
// {
// echo "ERROR: could not prepare SQL statement.";
// }
// $conn->close();

// delete user:
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