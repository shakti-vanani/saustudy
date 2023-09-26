<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saustudy";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// sql to create feedback table
$sql = "CREATE TABLE feedback 
(
    id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(2) NOT NULL,
    /*user_mail VARCHAR(100) NOT NULL,*/
    subject_name VARCHAR(20) NOT NULL,
    user_message VARCHAR(500) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
  echo "Table feedback created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}


mysqli_close($conn);
?>