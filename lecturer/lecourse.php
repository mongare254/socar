
<?php
require "../dbconnect.php";
$staffno=$_SESSION['username'];
$sql = "SELECT coursecode, coursetitle from courses WHERE staff_reg_no ='$staffno'";
$result = $conn->query($sql);
$result = mysqli_query($conn, $sql);
$all = mysqli_fetch_all($result, MYSQLI_ASSOC);

$conn->close();
?>