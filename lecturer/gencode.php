<?php
require '../dbconnect.php';
require '../logis.php';
if (isset($_POST['signcode'])){
	$staffno=$_SESSION['username'];
	$signcode =rand(1000,9999);
	$fullcoursename = $_POST['lecorse'];
	$partscoursename = explode(' ', $fullcoursename);
	$time=strtotime(date("d-m-Y H:i:s"));
	$coursecode = $partscoursename[0].' '.$partscoursename[1];
	//check if the code is already used
	$sql_check = "SELECT * FROM lec_sign WHERE staff_reg_no = '$staffno'";
	$result_check = mysqli_query($conn, $sql_check);
	if(mysqli_num_rows($result_check) == 0){
		$sign =mysqli_fetch_assoc($result_check);
		$timedb=$sign['sign_time'];
		$timedb_sec = strtotime($timedb);
        echo $timedb;
//         if(($time - $timedb_sec) <= 7200){
// 		$sql="INSERT INTO lec_sign
// 		(staff_reg_no, coursecode,sign_time,signcode,attends,numbers)VALUES ('$staffno','$coursecode','$time','$signcode','0','0')";
//         if ($conn->query($sql) === TRUE) {
// 			header("Location:lecturer.php?code=".$signcode);
// 		} else {
// 			header('Location:lecturer.php?failed');
// 			echo "Error: " . $sql . "<br>" . $conn->error;

// 		}
// }
// else{
// 	}
// }
} 	
}
?>
