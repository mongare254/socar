<?php
require 'dbconnect.php';
$sql = "SELECT  * from courses";
$result = mysqli_query($conn, $sql);
$all = mysqli_fetch_all($result, MYSQLI_ASSOC);

$conn->close();
?>