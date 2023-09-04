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
<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-content">
        <h1>View File</h1>
        <p>We offer the most complete house renovating services in the country</p>
        <div class="page_nav">
      <span>You are here:</span> <a href="index.php">home</a> <span><i class="fa fa-angle-double-right"></i>View</span>
      </div>
      </div>
    </div>
  </div>
</section>

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