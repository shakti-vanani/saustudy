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
			<div class="col viral-card m-1">
				
				Bca
            	<p>Bachlor Of Computer Application....</p>
				<form action="semesters.php" method="POST">
				<button class="btn viral-card-2 m-3" type="submit" name="semester">View Semester</button>
				</form>
			</div>
			<div class="col viral-card m-1">
				B.com
				<p>Bachlor Of Commerce....</p>
				<form action="semesters.php" method="POST">
				<button class="btn viral-card-2 m-3" type="submit" name="semester">view Semester</button>
				</form>
			</div>
			<div class="col viral-card m-1">
				Bsc
				<p>Bachlor Of Science....</p>
				<form action="semesters.php" method="POST">
				<button class="btn viral-card-2 m-3" type="submit" name="semester">View Semester</button>
				</form>
			</div>
		</div>
	</div>

	<?php include 'js.php'; ?>
</body>

</html>