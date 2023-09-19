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

	<div class="container-fluid   ">
		
		<div class="row  d-flex  justify-content-center  mt-3">
		<div class="col-md-4  col-sm-12">
						<div class="d-flex  justify-content-center  mt-3">
							<img class="logo" src="asset/images/saurashtra-university-logo.png" alt="" srcset="">
						</div>
                        <form class="viral-card mt-3 aline-item-center  p-2">
                            
                            <div class="input-group mb-3">
                                <span class="input-group-text viral-card-2 m-1 p-2" id="Email"><i
                                    class="bi bi-envelope-at"></i></span>
                                <input type="email" class="viral-card-1 m-1 p-2" placeholder="Email">
                              </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text viral-card-2 m-1 p-2" id="basic-addon1"><i
                                    class="bi bi-person-circle"></i></span>
                                <input type="text" class="viral-card-1 m-1 p-2" placeholder="Username">
                              </div>
                              <div class="input-group mb-3">
                                <span class="input-group-text viral-card-2 m-1 p-2" id="basic-addon1"><i
                                    class="bi bi-shield-lock"></i></span>
                                <input type="password" class="viral-card-1 m-1 p-2" placeholder="Password">
                              </div>
                           
                           <div class="mb-3 text-center">
                            <button type="submit" class="btn viral-card-2 ">login</button>
                            </div>
                            <div class="mb-3 text-center text-black">
                            <h3>Yor Have No Account TO</h3>
                            </div>
                           
                            <div class="mb-3 text-center">
                            <a href="signup.php" type="submit" class="btn viral-card-2 ">Create Account</a>
                            </div>
                        </form>
                    </div>
		</div>
	</div>
	</div>

	<?php include 'js.php'; ?>
</body>

</html>