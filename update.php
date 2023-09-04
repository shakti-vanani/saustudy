<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <?php include 'css.php'; ?>
</head>

<body>
    <form method="POST" action="main.php">
        <h1>update info</h1>
        <div class="container-fluid">
		<div class="mb-3">
                <label for="fname" class="form-label">fname</label>
                <input type="text" class="form-control" name="fname" required>
            </div>
            <div class="lname">
                <label for="lname" class="form-label">lname</label>
                <input type="text" class="form-control" name="lname" required>
            </div>
			<div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" required>
            </div>  
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
			<div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" class="form-control" name="password" required>
            </div>  

        </div>
        <button type="submit" name="update">update</button>
    </form>

    <?php include 'js.php'; ?>
</body>

</html>