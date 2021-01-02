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

$sql = "select last_name, salary, commission_pct
from employees
where commission_pct is null
order by salary, commission_pct";
$result = $conn->query($sql);

// Name, Location, Number
// of People, and Salary
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "
    last_name: " . $row["last_name"]. 
    " - salary : " . $row["salary"] .
    "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?> 