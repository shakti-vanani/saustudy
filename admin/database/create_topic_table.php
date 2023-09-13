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
//sql to topics table
$sql = "CREATE TABLE topics
(
    topic_id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_id  INT(2) NOT NULL,
    semester_id INT(2) NOT NULL,
    category_id INT(2) NOT NULL,
    matirial_id INT(2) NOT NULL,
    topic VARCHAR(30) NOT NULL,
    topic_detail VARCHAR(30) NOT NULL,
    create_at DATE NOT NULL,
    update_at DATE NOT NULL
)";

if (mysqli_query($conn, $sql)) {
  echo "Table topics created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}
 

mysqli_close($conn);
?>