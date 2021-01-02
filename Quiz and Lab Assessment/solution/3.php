<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cse311_section_2_fall_20";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "select d.department_name`Name`,d.location_id `Location`, count(*)`Number_of_People` ,round(avg(e.salary),2) `Salary` from departments d , employees e where e.department_id=d.department_id group by d.department_name,d.location_id";
$result = $conn->query($sql);

// Name, Location, Number
// of People, and Salary
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "
    Name: " . $row["Name"]. 
    " - Location : " . $row["Location"] .
    " - Number_of_People : " . $row["Number_of_People"] .
    " - Salary : " . $row["Salary"] .
    "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?> 