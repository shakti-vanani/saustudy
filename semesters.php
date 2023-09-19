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
			<?php include 'slider.php'; ?>
		</div>
        <div class="row mt-3">

			<?php
			 $id=$_POST['course_id'];
             // echo $id;
               $sql="SELECT * FROM semesters WHERE course_id='$id'";      
               $res = mysqli_query($conn, $sql);
               
               while ($row = mysqli_fetch_assoc($res)) {
				?>
				<div class="col-md-4 col-sm-12 ">
					<div class="card viral-card m-1 text-center p-1">
						<h4>
                        <?php echo $row["semester"]; ?>
						</h4>
						<form action="subject.php" method="POST">
							<button class="btn viral-card-2 m-3" type="submit" name="semester_id"
								value="<?php echo $row["semester_id"]; ?>">View subject</button>
						</form>
					</div>

				</div>
			<?php } ?>
           
           
        </div>
    </div>
    </div>

    <?php include 'js.php'; ?>
</body>

</html>