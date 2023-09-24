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
    function insert($course_id,$semester)
    {
        $sql = "INSERT INTO `semesters`(`course_id`,`semester`) VALUES ('$course_id','$semester')";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function update($id, $course_id,$semester)
    {
        $sql = "UPDATE `semesters` SET `course_id`='$course_id',`semester`='$semester' WHERE `semester_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function delete($id)
    {
        $sql = "DELETE FROM `semesters` WHERE `semesters_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function view()
    {
            
        $sql = "SELECT semester_id,course,semester FROM `semesters` INNER JOIN courses USING(course_id)";
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
    $semester = $_POST['semester'];

    $res = $obj->insert($course_id,$semester);
    if ($res) {
        header("location:semesters.php");
    } else {
        echo "alert('data not inserted successfully')";
    }
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $course_id = $_POST['course_id'];
    $semester=$_POST['semester'];

    $res = $obj->update($id, $course_id,$semester);
    if ($res) {
        header("location:semesters.php");
    } else {
        echo "alert('data not updated successfully')";
    }
} elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];
    // $id=$_POST['semester_id'];
    $res = $obj->delete($id);
    if ($res) {
        header("location:semesters.php");
    } else {
        echo "not deleted";
    }
}

//$obj1=new courses();
?>