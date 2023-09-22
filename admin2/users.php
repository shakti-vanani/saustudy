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
    include 'controller/users_controller.php';
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