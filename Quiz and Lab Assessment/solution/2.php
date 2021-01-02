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

$sql = "Select first_name, manager_id, MAX(salary)from employees
where manager_id is not null
group by manager_id
having min(salary) > 6000
order by min(salary) desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "
    first_name: " . $row["first_name"]. 
    " - manager_id : " . $row["manager_id"] .
    " - MAX(salary) : " . $row["MAX(salary)"] .
    "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?> 