<?php
require 'dbconnect.php';
$admno=$_SESSION['username'];
$sql = "SELECT  * from course_reg WHERE admno ='$admno'";
$result = mysqli_query($conn, $sql);
$courses = mysqli_fetch_all($result, MYSQLI_ASSOC);

$conn->close();
?>