<?php 
include 'admin/controller/database/db.php'; 
include 'admin/error.php';
if (isset($_POST['submit'])) {
    
 
  $fname= $conn->real_escape_string($_POST['fname']);
  $lname= $conn->real_escape_string($_POST['lname']);
  $email= $conn->real_escape_string($_POST['email']);
  $username= $conn->real_escape_string($_POST['username']);
  $pass = $conn->real_escape_string(md5($_POST['password']));
  //$role     = $conn->real_escape_string($_POST['role']);
  $sql  = "INSERT INTO `users`(`fname`, `lname`, `email`, `username`, `pass`) VALUES ('$fname','$lname','$email','$username','$pass')";
 
  $result=mysqli_query($conn,$sql);
  if ($result==true) {
    header("Location:index.php");
    die();
  }else{
    $errorMsg  = "You are not Registred..Please Try again";
  }   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Saustudy</title>
	<?php include 'css.php'; ?>
</head>

<body>

	<div class="container-fluid   ">
		
		<div class="row  d-flex  justify-content-center  mt-3">
		<div class="col-md-4  col-sm-12">
						<div class="d-flex  justify-content-center  mt-3">
							<img class="logo" src="asset/images/saurashtra-university-logo.png" alt="" srcset="">
						</div>
                        <form class="viral-card mt-3 aline-item-center  p-2" action="signup.php" method="POST">
                            
                            
                              <div class="input-group mb-3">
                                <span class="input-group-text viral-card-2 m-1 p-2" id="basic-addon1"><i
                                    class="bi bi-person-circle"></i></span>
                                <input type="text" name="fname" class="viral-card-1 m-1 p-2" placeholder="Name">
                              </div>
                              <div class="input-group mb-3">
                                <span class="input-group-text viral-card-2 m-1 p-2" id="basic-addon1"><i
                                    class="bi bi-person-circle"></i></span>
                                <input type="text" name="lname" class="viral-card-1 m-1 p-2" placeholder="Surname">
                              </div>
                              <div class="input-group mb-3">
                                <span class="input-group-text viral-card-2 m-1 p-2" id="Email"><i
                                    class="bi bi-envelope-at"></i></span>
                                <input type="email" name="email" class="viral-card-1 m-1 p-2" placeholder="Email">
                              </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text viral-card-2 m-1 p-2" id="basic-addon1"><i
                                    class="bi bi-person-circle"></i></span>
                                <input type="text" name="username" class="viral-card-1 m-1 p-2" placeholder="Username">
                              </div>
                              <div class="input-group mb-3">
                                <span class="input-group-text viral-card-2 m-1 p-2" id="basic-addon1"><i
                                    class="bi bi-shield-lock"></i></span>
                                <input type="password" class="viral-card-1 m-1 p-2" placeholder="Password">
                              </div>
                           
                           <div class="mb-3 text-center">
                            <button type="submit" name="submit" class="btn viral-card-2 ">Sign Up</button>
                            </div>
                            <div class="mb-3 text-center text-black">
                            <h3>you have alrady Account to </h3> 
                            </div>
                           
                            <div class="mb-3 text-center">
                            <a href="index.php" type="submit" class="btn viral-card-2 ">Login</a>
                            </div>
                        </form>
                    </div>
		</div>
	</div>
	</div>

	<?php include 'js.php'; ?>
</body>

</html>