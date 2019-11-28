<?php
// connect to the database
include('../dbconnect.php');

// get the records from the database
if ($result = $conn->query("SELECT id,firstname, secondname,staff_reg_no,email,status FROM users WHERE user_type='STUDENT' ORDER BY id"))
{
// display records if there are records to display
if ($result->num_rows > 0)
{
// display records in a table
echo "<table border='1' cellpadding='10'>";

// set table headers
echo "<tr><th>ID</th><th>FIRSTNAME</th><th>SECONDNAME</th><th>STAFF NUMBER</th><th>EMAIL ADDRESS/th>
<th>STATUS</th><th>EDIT</th><th>DELETE</th></tr>";

while ($row = $result->fetch_object())
{
// set up a row for each record
echo "<tr>";
echo "<td>" . $row->id . "</td>";
echo "<td>" . $row->firstname . "</td>";
echo "<td>" . $row->secondname . "</td>";
echo "<td>" . $row->staff_reg_no. "</td>";
echo "<td>" . $row->email . "</td>";
echo "<td>" . $row->status . "</td>";
echo "<td><a href='reglec.php?edituser=" . $row->id . "''><button>Edit</button></a></td>";
echo "<td><a href='delete.php?id=" . $row->id . "'><button>Delete</button></a></td>";
echo "</tr>";
}

echo "</table>";
}
// if there are no records in the database, display an alert message
else
{
echo "NO STUDENTS REGISTERED";
}
}
// show an error if there is an issue with the database query
else
{
echo "Error: " . $conn->error;
}

// close database connection
$conn->close();

?>