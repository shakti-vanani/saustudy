<?php include 'admin/database/db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Saustudy</title>
	<?php include 'css.php'; ?>
</head>

<body>
	<?php include 'menu.php'; ?>

	<div class="container">
		<div class="row mt-3">
				
				<?php
					 $sql="SELECT * FROM courses";      
					 $res = mysqli_query($conn, $sql);
					 
					 while ($row = mysqli_fetch_assoc($res)) {
						?>
							<div class="col viral-card m-1">
							<?php echo $row["course"]; ?>
							<form action="semesters.php" method="POST">
							<button class="btn viral-card-2 m-3" type="submit" name="semester" value="<?php echo $row["course_id"]; ?>">View Semester</button>
					 </form>
							</div>
						<?php } 
				?>
			</div>
		</div>
	</div>

	<?php include 'js.php'; ?>
</body>

</html>