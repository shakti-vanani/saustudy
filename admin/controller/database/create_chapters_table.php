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
//sql to chapter table
$sql = "CREATE TABLE chapters
(
    chapter_id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_id  INT(2) NOT NULL,
    semester_id INT(2) NOT NULL,
    subject_id INT(2) NOT NULL,
    category_id INT(2) NOT NULL,
    chapter VARCHAR(30) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
  echo "Table chapter created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}
 

mysqli_close($conn);
?>