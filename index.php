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

	<div class="container-fluid ">
		
		<div class="row center mt-3">
		<div class="col-md-5 col-sm-12 m-2">
                        <form class="viral-card p-2">
                            
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
                            <button type="submit" class="btn viral-card-2 ">Submit</button>
                        </div>
                        </form>
                    </div>
		</div>
	</div>
	</div>

	<?php include 'js.php'; ?>
</body>

</html>