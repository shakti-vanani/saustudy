<?php
include 'error.php';
error_reporting(0);
class feedback
{
    private $conn = '';
    function __construct()
    {
        include 'database/db.php';
        //$conn= new mysqli('localhost','root','','saustudy');
        $this->db = $conn;

    }
    function insert($user_id,$subject,$user_message)
    {
        $sql = "INSERT INTO `feedback`(`user_id`,`subject_name`, `user_message`) VALUES ('$user_id','$subject','$user_message')";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
};
$obj = new feedback();
if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
   // $user_mail = $_POST['user_mail'];
    $subject = $_POST['subject'];
    $user_message = $_POST['user_message'];

    $res = $obj->insert($user_id,$subject,$user_message);
    if ($res) {
        header("location:/saustudy/feedback.php");
    } else {
        echo "alert('data not inserted successfully')";
    }
}

//$obj1=new courses();
?>