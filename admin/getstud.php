<?php
require '../dbconnect.php';

  $query = "SELECT firstname, secondname,staff_reg_no,email FROM users WHERE user_type='STUDENT'"; 
  $result = mysqli_query($conn,$query);

echo "<table>"; // start a table tag in the HTML
echo "<tr><th>"."FIRSTNAME". "</th><th>"."SECONDNAME"."</th><th>"."ADMISSION NUMBER"."</th><th>"."EMAIL"."</th><th></th><th></th></tr>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['firstname'] . "</td><td>" . $row['secondname'] . "</td><td>" . $row['staff_reg_no'] . "</td><td>" . $row['email'] . "</td><td><button >EDIT </button></td><td><button >DELETE </button></td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML


?>