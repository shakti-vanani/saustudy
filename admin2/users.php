<?php 
include 'admin/error.php';
session_start();
// Include database connection file
include_once('admin/database/db.php');
if (!isset($_SESSION['ID'])) {
    header("Location:index.php");
    exit();
}
if(0==$_SESSION['ROLE']){
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
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Saustudy</title>
	<?php include 'css.php'; ?>
</head>

<body class="">
	<?php include 'menu.php'; ?>

	<div class="container ">
		
		<div class="row mt-1">
        <?php
			 $data = $obj->view();
             while ($row = mysqli_fetch_assoc($data)){
				?>
				<div class="col-lg-4 col-md-4 col-sm-12 ">
					<div class="card viral-card m-1 text-center p-1">
						<h4>
							<?php echo $row["username"]; ?>
						</h4>
                        <div class="">
                            <p><?php echo $row["fname"]; ?></p>
                            <p><?php echo $row["lname"]; ?></p>
                            <p><?php echo $row["email"]; ?></p>
                        </div>
						
					</div>

				</div>
			<?php }
			?>
		</div>
        
       
	</div>
    <?php include 'footer.php'; ?>
	

	<?php include 'js.php'; ?>
</body>

</html>

<?php }else{
            
            include 'logout.php';
        }
        
        ?>