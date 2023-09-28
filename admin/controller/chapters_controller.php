<?php
include 'error.php';
error_reporting(0);
class chapters
{
    private $conn = '';
    function __construct()
    {
        include 'database/db.php';
        //$conn= new mysqli('localhost','root','','saustudy');
        $this->db = $conn;

    }
    function insert($course_id,$semester_id,$subject_id,$category_id,$chapter)
    {
        $sql = "INSERT INTO `chapters`(`course_id`, `semester_id`, `subject_id`, `category_id`, `chapter`) VALUES ('$course_id','$semester_id','$subject_id','$category_id','$chapter')";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function update($id, $course_id,$semester_id,$subject_id,$category_id,$chapter)
    {
        $sql = "UPDATE `chapters` SET `course_id`='$course_id',`semester_id`='$semester_id',`subject_id`='$subject_id',`category_id`='$category_id',`chapter`='$chapter' WHERE `chapter_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function delete($id)
    {
        $sql = "DELETE FROM `chapters` WHERE `chapter_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function view()
    {
            
        $sql = "SELECT chapter_id,course,semester,subject_name,category,chapter FROM `chapters` INNER JOIN courses USING(course_id) INNER JOIN semesters USING(semester_id)  INNER JOIN subjects USING(subject_id) INNER JOIN category USING(category_id)";
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
$obj = new chapters();
if (isset($_POST['submit'])) {
    $course_id = $_POST['course_id'];
    $semester_id = $_POST['semester_id'];
    $subject_id = $_POST['subject_id'];
    $category_id=$_POST['category_id'];
    $chapter=$_POST['chapter'];

    $res = $obj->insert($course_id,$semester_id,$subject_id,$category_id,$chapter);
    if ($res) {
        header("location:chapters.php");
    } else {
        echo "alert('data not inserted successfully')";
    }
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $course_id = $_POST['course_id'];
    $semester_id=$_POST['semester_id'];
    $subject_id=$_POST['subject_id'];
    $category_id=$_POST['category_id'];
    $chapter=$_POST['chapter'];

    $res = $obj->update($id, $course_id,$semester_id,$subject_id,$category_id,$chapter);
    if ($res) {
        header("location:chapters.php");
    } else {
        echo "alert('data not updated successfully')";
    }
} elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $res = $obj->delete($id);
    if ($res) {
        header("location:chapters.php");
    } else {
        echo "not deleted";
    }
}

//$obj1=new chapters();
?>