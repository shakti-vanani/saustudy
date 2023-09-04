<?php
include 'admin/error.php'; 
class user
{
    private $conn='';
    function __construct()
    {
                include 'admin/database/db.php';
                //$conn= new mysqli('localhost','root','','saustudy');
                $this->db=$conn;
               
    }
    function insert($fname,$lname,$email,$username,$password)
    {   
        $sql="INSERT INTO `users`(`fname`, `lname`, `email`, `username`, `pass`) VALUES ('$fname','$lname','$email','$username','$password')";
        $res=mysqli_query($this->db,$sql);
        return $res;
    }
    function edit($id,$fname,$lname,$email,$username,$password)
    {  
        $sql="UPDATE `users` SET `fname`='$fname',`lname`='$lname',`email`='$email',`username`='$username',`pass`='$password' WHERE `id`='$id'";
        $res=mysqli_query($this->db,$sql);
        return $res;
    }
    function delete($id)
    {   $sql="DELETE FROM `users` WHERE `id`='$id'";
        $res=mysqli_query($this->db,$sql);
        return $res;
    }
    function view()
    {       
            $sql="SELECT * FROM `users`";
            $res=mysqli_query($this->db,$sql);
            return $res;
    }
}
$obj=new user();
if(isset($_POST['submit']))
{    
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $res=$obj->insert($fname,$lname,$email,$username,$password);
        if($res)
        {
            header("location:view.php");
        }
        else{
            echo"alert('data not inserted successfully')";
        }
} 
elseif(isset($_POST['update']))
{    

        $id=$_POST['id'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $res=$obj->edit($id,$fname,$lname,$email,$username,$password);
        if($res)
        {
           header("location: view.php");
        }
        else{
            echo"data not updated successfully";
        }
    
} 
elseif(isset($_POST['delete']))
{
         $id=$_POST['id'];
        $res=$obj->delete($id);
        if($res)
        {
            header("location:view.php");
        }
        else{
            echo"not deleted";
        }
   }    
?>