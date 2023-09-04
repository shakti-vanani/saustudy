<?php
class test
{
    private $conn='';
    function __construct()
    {
                $conn= new mysqli('localhost','root','','saustudy');
                $this->db=$conn;
                if($this->db)
                {echo "connected";
                }
                else
                { echo" not connected";
                }
    }
    function insert($fname,$lname,$email,$username,$password)
    {
        $res=mysqli_query($this->db,"INSERT INTO `users`(`fname`, `lname`, `email`, `username`, `pass`) VALUES ('$fname','$lname','$email','$username','$password')");
        return $res;
    }
    function edit($fname,$lname,$email,$username,$password)
    {  
        $sql=mysqli_query($this->db,"UPDATE `users` SET `fname`='$fname',`lname`='$lname',`email`='$email',`username`='$username',`pass`='$password' WHERE `id`='$id'");
        return $sql;
    }/*
    function delete($id)
    {
        $sql=mysqli_query($this->db,"DELETE FROM `users` WHERE `id`='$id'");
        return $sql;
    }
    */
    function view()
    {
            $res=mysqli_query($this->db,"SELECT * FROM `users`");
            return $res;
    }
}
$obj=new test();
if(isset($_GET['submit']))
{    
        $fname=$_GET['fname'];
        $lname=$_GET['lname'];
        $email=$_GET['email'];
        $username=$_GET['username'];
        $username=$_GET['password'];
        $res=$obj->insert($fname,$lname,$email,$username,$password);
        if($res)
        {
            header("location:view.php");
        }
        else{
            echo"alert('data not inserted successfully')";
        }
}
elseif(isset($_GET['update']))
{    

        $id=$_GET['id'];
        $fname=$_GET['fname'];
        $lname=$_GET['lname'];
        $email=$_GET['email'];
        $username=$_GET['username'];
        $password=$_GET['password'];
        $res=$obj->edit($id,$fname,$lname,$email,$username,$password);
        if($res)
        {
           header("location:view.php");
        }
        else{
            echo"data not updated successfully";
        }
    
} /*  
elseif(isset($_GET['delete']))
{
         $id=$_GET['id'];
        $res=$obj->delete($id);
        if($res)
        {
            header("location:view.php");
        }
        else{
            echo"not deleted";
        }
   }  */    
?>