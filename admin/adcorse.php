
<?php

include_once '../dbconnect.php';

if(isset($_POST['adcors']))
{
	$cc = $_POST['cc'];
	$ct = $_POST['ct'];
	$sem = $_POST['sem'];
	$lec = $_POST['lecturer'];
	$year =$_POST['year'];
    $fullname = $_POST['lecturer'];
    $partsfullname = explode(' ', $fullname);
    $staffnumber = $partsfullname[0];

	$check = $conn->query("SELECT coursecode FROM courses WHERE coursecode='$cc'");
	$count=$check->num_rows;

	if($count==0){
		
		
		$query = "INSERT INTO courses(coursecode, coursetitle,year, sem, staff_reg_no)
		VALUES('$cc','$ct','$year','$sem','$staffnumber')";
		
		if ($conn->query($query) === TRUE) {
			header('Location:regcourse.php?success');
		} else {
			echo "Error: " . $query . "<br>" . $conn->error;
		}

	}
	else
		header('Location:regcourse.php?exists');
}
$conn->close();

?>


