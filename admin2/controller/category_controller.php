<?php
include 'error.php';
error_reporting(0);
class courses
{
    private $conn = '';
    function __construct()
    {
        include 'database/db.php';
        //$conn= new mysqli('localhost','root','','saustudy');
        $this->db = $conn;

    }
    function insert($course_id,$semester_id,$subject_id,$category)
    {
        $sql = "INSERT INTO `category`(`course_id`,`semester_id`,`subject_id`,`category`) VALUES ('$course_id','$semester_id','$subject_id','$category')";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function update($id, $course_id,$semester_id,$subject_id,$category)
    {
        $sql = "UPDATE `category` SET `course_id`='$course_id',`semester_id`='$semester_id',`subject_id`='$subject_id',`category`='$category' WHERE `category_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function delete($id)
    {
        $sql = "DELETE FROM `category` WHERE `category_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function view()
    {
            
        $sql = "SELECT category_id,course,semester,subject_name,category FROM `category` INNER JOIN courses USING(course_id) INNER JOIN semesters USING(semester_id) INNER JOIN subjects USING(subject_id)";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function courseview()
    {
            
        $sql = "SELECT * FROM `courses`";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
}
$obj = new courses();
if (isset($_POST['submit'])) {
    $course_id = $_POST['course_id'];
    $semester_id = $_POST['semester_id'];
    $subject_id = $_POST['subject_id'];
    $category=$_POST['category'];

    $res = $obj->insert($course_id,$semester_id,$subject_id,$category);
    if ($res) {
        header("location:category.php");
    } else {
        echo "alert('data not inserted successfully')";
    }
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $course_id = $_POST['course_id'];
    $semester_id=$_POST['semester_id'];
    $subject_id=$_POST['subject_id'];
    $category=$_POST['category'];

    $res = $obj->update($id, $course_id,$semester_id,$subject_id,$category);
    if ($res) {
        header("location:category.php");
    } else {
        echo "alert('data not updated successfully')";
    }
} elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];
    // $id=$_POST['semester_id'];
    $res = $obj->delete($id);
    if ($res) {
        header("location:category.php");
    } else {
        echo "not deleted";
    }
}

//$obj1=new courses();
?>