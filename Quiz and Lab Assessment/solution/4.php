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

$sql = "SELECT job_id, COUNT(*) as count
FROM employees
GROUP BY job_id;";
$result = $conn->query($sql);

// Name, Location, Number
// of People, and Salary
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "
    job_id: " . $row["job_id"]. 
    " - count : " . $row["count"] .
    "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?> 