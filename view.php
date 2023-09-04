<?php
include 'main.php';
$obj1=new test();
?>
<!DOCTYPE html>
<html>
<head>
    <title>view data</title>
</head>
<body>	

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
				<?php  echo $row["password"];  ?>
			</td>
			<td>
					<a href="/saustudy/update.php?id=<?php echo $row["id"]; ?>"><span class="button">EDIT</span></a>
		 </td>
		 <td>		
					<a href="/saustudy/delete.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('are you sure to delete')" ><span class="bg bg-danger">DELETE</span></a>
                </td>
		</tr>
		<?php	}		
		echo "</table>";
		?>
</body>
</html>