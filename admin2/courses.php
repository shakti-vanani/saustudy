<?php 
//include 'error.php';
session_start();
// Include database connection file
include_once('controller/database/db.php');
if (!isset($_SESSION['ID'])) {
    include 'logout.php';
    exit();
}
if(0==$_SESSION['ROLE']){
    include 'controller/courses_controller.php';
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
        <form class="viral-card mt-3 aline-item-center p-2" action="" method="POST">
                            
                            <div class="input-group mb-3">
                                <span class="input-group-text viral-card-2 m-1 p-2" id="Email"><i
                                    class="bi bi-envelope-at"></i></span>
                                <input type="email" name="email" class="viral-card-1 m-1 p-2" placeholder="Email">
                              </div>
        </form>
        <form method="POST" action="courses.php">
                        <div class="form-group row pd-10">
                            <label class="col-sm-12 col-md-2 col-form-label">
                                <div class="title">
                                    <h4>Course Name</h4>
                                </div>
                            </label>
                            <div class="col-sm-12 col-md-8">
                                <input class="form-control" type="text" name="course" placeholder="Add New Courses">
                            </div>
                            <div class="col-sm-12 col-md-2">
                                <button type="submit" name="submit" class="btn btn-success">submit</button>
                            </div>
                        </div>
                    </form>
        <?php /*
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
			<?php  } */
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