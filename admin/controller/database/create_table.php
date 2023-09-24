<?php
error_reporting(E_ALL);
ini_set("display_errors", 1); 
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
// sql to create Courses table
$sql = "CREATE TABLE courses 
(
    course_id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course VARCHAR(30) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
  echo "Table course created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}
// sql to create Semester table
$sql = "CREATE TABLE semesters 
(    
    semester_id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_id  INT(2) NOT NULL,
    semester VARCHAR(30) NOT NULL
    
)";
//FOREIGN KEY (course_id) REFERENCES courses(course_id)
if (mysqli_query($conn, $sql)) {
  echo "Table Semesters created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}
//sql to create subject table
$sql = "CREATE TABLE subjects 
(    
    subject_id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_id  INT(2) NOT NULL,
    semester_id INT(2) NOT NULL ,
    subject_name VARCHAR(30) NOT NULL
    
)";
if (mysqli_query($conn, $sql)) {
  echo "Table subjects created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}
// sql to create Category table
$sql = "CREATE TABLE category
(
    category_id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_id  INT(2) NOT NULL,
    semester_id INT(2) NOT NULL,
    subject_id INT(2) NOT NULL,
    category VARCHAR(30) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
  echo "Table Categorys created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}
//sql to topics table
$sql = "CREATE TABLE topics
(
    topic_id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_id  INT(2) NOT NULL,
    semester_id INT(2) NOT NULL,
    subject_id INT(2) NOT NULL,
    category_id INT(2) NOT NULL,
    topic VARCHAR(30) NOT NULL,
    topic_detail VARCHAR(100) NOT NULL,
    create_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    update_at DATE
)";

if (mysqli_query($conn, $sql)) {
  echo "Table topics created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}


mysqli_close($conn);
?>