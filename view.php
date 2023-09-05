<?php
include 'main.php';
$obj1=new user();
?>
<!DOCTYPE html>
<html>
<head>
    <title>view data</title>
	<?php include 'css.php'; ?>
</head>
<body>	
<?php include 'menu.php'; ?>
	<table class="table">
		<tr class="title">
			<td>id</td>
			<td>fname</td>
			<td>lname</td>
			<td>email</td>
			<td>username</td>
            <td>password</td>
			<td>action</td>
			<td></td>
		</tr>
		<?php 
		$data=$obj1->view();
		 while($row = mysqli_fetch_assoc($data)) {
		?>
		<tr>	
			<td>
				<?php  echo $row["id"];  ?>
			</td>
			<td>
				<?php  echo $row["fname"];  ?>
			</td>
			<td>
				<?php  echo $row["lname"];  ?>
			</td>
            <td>
				<?php  echo $row["email"];  ?>
			</td>
			<td>
				<?php  echo $row["username"];  ?>
			</td>
			<td>
					<a href="/saustudy/update.php?id=<?php echo $row["id"]; ?>"><span class="btn btn-primary">EDIT</span></a>
		 </td>
		 <td>		
					<a href="/saustudy/delete.php?id=<?php echo $row["id"]; ?>" ><span class="btn btn-danger">DELETE</span></a>
                </td>
		</tr>
		<?php	}		
		echo "</table>";
		?>
		<?php include 'js.php'; ?>
</body>
</html>