<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>delete</title>
    <?php include 'css.php'; ?>
</head>
<body>
    <?php
        $id=$_GET['id'];
    ?>
    <form action="main.php" method="POST">
        <input type="number" value="<?php  echo $id ?>" name="id" hidden>
        <?php echo "delete this id ". $id ?> <button class="btn btn-danger m-3" type="submit" name="delete"
            onclick="return confirm('are you sure to delete')">delete</button>

    </form>
    <?php include 'js.php'; ?>
</body>
</html>