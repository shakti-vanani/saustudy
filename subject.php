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
			 $id=$_POST['semester_id'];
             //echo $id;
               $sql="SELECT * FROM subjects WHERE semester_id='$id'";      
               $res = mysqli_query($conn, $sql);
               
               while ($row = mysqli_fetch_assoc($res)) {
				?>
				<div class="col  m-1">
					<div class="card viral-card m-1 text-center p-1">
						<h4>
                        <?php echo $row["subject_name"]; ?>
						</h4>
						<form action="category.php" method="POST">
							<button class="btn viral-card-2 m-3" type="submit" name="course_id"
								value="<?php echo $row["subject_id"]; ?>">View category</button>
						</form>
					</div>

				</div>
			<?php }
            
             ?>
        </div>
    </div>
    </div>

    <?php include 'js.php'; ?>
</body>

</html>