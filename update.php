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
    <?php include 'menu.php'; ?>
    <div class="container-fluid">
        <form method="POST" class="form border border-primary m-3 p-2 rounded" action="main.php">
            <?php
                 $id=$_GET['id'];
                //$id=$_POST['id'];
            ?>
            <input type="number" value="<?php echo $id ?>" name="id">
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
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button class="btn btn-primary" type="submit" name="update">update</button>
        </form>
    </div>
    <?php include 'js.php'; ?>
</body>

</html>