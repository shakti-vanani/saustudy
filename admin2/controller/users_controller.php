<?php 
class users
    {
        private $conn = '';
        function __construct()
        {
            include 'database/db.php';
            //$conn= new mysqli('localhost','root','','saustudy');
            $this->db = $conn;
    
        }
        /*function insert($course)
        {
            $sql = "INSERT INTO `courses`(`course`) VALUES ('$course')";
            $res = mysqli_query($this->db, $sql);
            return $res;
        }
        function update($id, $course)
        {
            $sql = "UPDATE `courses` SET `course`='$course' WHERE `course_id`='$id'";
            $res = mysqli_query($this->db, $sql);
            return $res;
        }
        function delete($id)
        {
            $sql = "DELETE FROM `courses` WHERE `course_id`='$id'";
            $res = mysqli_query($this->db, $sql);
            return $res;
        }*/
        function view()
        {
                
            $sql = "SELECT * FROM `users`";
            $res = mysqli_query($this->db, $sql);
            return $res;
        }
    }
    $obj = new users();
    /*if (isset($_POST['submit'])) {
        $course = $_POST['course'];
    
        $res = $obj->insert($course);
        if ($res) {
            header("location:courses.php");
        } else {
            echo "alert('data not inserted successfully')";
        }
    }
    if (isset($_POST['update'])) {
        $id = $_POST['course_id'];
        $course = $_POST['course'];
    
        $res = $obj->update($id, $course);
        if ($res) {
            header("location:courses.php");
        } else {
            echo "alert('data not updated successfully')";
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        // $id=$_POST['course_id'];
        $res = $obj->delete($id);
        if ($res) {
            header("location:courses.php");
        } else {
            echo "not deleted";
        }
    }*/
    
    //$obj1=new courses();
?>