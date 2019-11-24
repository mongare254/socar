<?php


include('dbconnect.php');



// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['cc']))

{

// get id value

$courscode = $_GET['cc'];



// delete the entry

$result = mysql_query("DELETE FROM course_reg WHERE courscode=$courscode")

or die(mysql_error());


header("Location: courses.ph?delsuccess");

}

else

{

header("Location: courses.php?delunsuccess?");

}



?>