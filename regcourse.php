<?php
session_start();
ini_set('display errors', 1);
error_reporting('0');
require 'logis.php';
require 'getcourse.php';
require 'dbconnect.php';
if (isset($_POST['regcos'])){
    $admno=$_SESSION['username'];
    $fullcoursename = $_POST['course'];
    $partscoursename = explode(' ', $fullcoursename);
    $coursecode = $partscoursename[0].' '.$partscoursename[1];
    $course = "SELECT coursetitle FROM courses WHERE coursecode ='$coursecode'";
    $check_course = $conn->query($course);
    $row = $check_course->fetch_assoc();
    $ct=$row["coursetitle"];
    $check="SELECT coursecode from course_reg WHERE admno='$admno' AND coursecode='$coursecode'";
    $course_count=mysqli_query($conn,$check); 
    $result= mysqli_num_rows($course_count);

    if($result==0){
        $sql="INSERT INTO course_reg(reg_id,coursecode,coursetitle, admno,attends) VALUES ('','$coursecode','$ct','$admno','0')";
        if ($conn->query($sql) === TRUE) {
            header('Location:courses.php?success');
        }}else {
            header('Location:courses.php?failed');
        }
    }
    ?>