<?php
include 'error.php';
class category
{
    private $conn = '';
    function __construct()
    {
        include 'database/db.php';
        //$conn= new mysqli('localhost','root','','saustudy');
        $this->db = $conn;
    }
    function insert($course_id, $semester_id,$subject_id,$category_id,$chapter_id,$topic_category)
    {
        $sql = "INSERT INTO `topics`(`course_id`, `semester_id`, `subject_id`, `category_id`,`chapter_id`,`topic_category`) VALUES ('$course_id','$semester_id','$subject_id','$category_id',$chapter_id',$topic_category')";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function edit($id,$course_id, $semester_id,$subject_id, $category_id,$chapter_id,$topic_category)
    {
        $sql = "UPDATE `topics` SET `course_id`='$course_id',`semester_id`='$semester_id',`subject_id`='$subject_id',`category_id`='$category_id',`chapter_id`='$chapter_id',`topic_category`='$topic_category' WHERE `topic_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function delete($id)
    {
        $sql = "DELETE FROM `topics` WHERE `topic_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function view()
    {
        $sql = "SELECT topic_id,course,semester,subject_name,category,chapter,topic_category,create_at,update_at FROM topics INNER JOIN courses USING(course_id) INNER JOIN semesters USING(semester_id) INNER JOIN subjects USING(subject_id) INNER JOIN category USING(category_id) INNER JOIN chapters USING(chapter_id)";
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
$obj = new category();
if (isset($_POST['submit'])) {
    $course_id = $_POST['course_id'];
    $semester_id = $_POST['semester_id'];
    $subject_id = $_POST['subject_id'];
    $category_id = $_POST['category_id'];
    $chapter_id = $_POST['chapter_id'];
    $topic_category = $_POST['topic_category'];
    $res = $obj->insert($course_id, $semester_id,$subject_id,$category_id,$chapter_id,$topic_category);
    if ($res) {
        header("location:topic.php");
    } else {
        echo "alert('data not inserted successfully')";
    }
}
if (isset($_POST['update'])) {
    $id = $_POST['topic_id'];
    $course_id = $_POST['course_id'];
    $semester_id = $_POST['semester_id'];
    $subject_id = $_POST['subject_id'];
    $category_id = $_POST['category_id'];
    $chapter_id = $_POST['chapter_id'];
    $topic_category = $_POST['topic_category'];
    $res = $obj->edit($id,$course_id, $semester_id,$subject_id,$category_id,$chapter_id,$topic_category);
    if ($res) {
        header("location:topic.php");
    } else {
        echo "alert('data not updated successfully')";
    }
} elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $res = $obj->delete($id);
    if ($res) {
        header("location:topic.php");
    } else {
        echo "not deleted";
    }
}
//$obj1=new category();
?>