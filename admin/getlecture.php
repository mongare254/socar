<?php
require '../dbconnect.php';
$sql = "SELECT  * from users WHERE user_type='LECTURER'";
$result = $conn->query($sql);
$all = mysqli_fetch_all($result, MYSQLI_ASSOC);
if ($result->num_rows > 0) {
    // output data of each row
    foreach($all as $one){
                  echo '<option>'.$one['staff_reg_no'].' '.$one['firstname'].' '.$one['secondname'].'</option>';
                }
} else {
     
}
$conn->close();
?>