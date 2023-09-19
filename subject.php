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
    <?php include 'menu.php'; ?>

    <div class="container">
    <div class="row mt-3">
			<?php include 'slider.php'; ?>
		</div>
        <div class="row mt-3">

            <?php
            $id = $_POST['semester_id'];
            //echo $id;
            $sql = "SELECT * FROM subjects WHERE semester_id='$id'";
            $res = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                ?>
                <div class="col-md-4 col-sm-12  m-1">
                    <div class="card viral-card m-1 text-center p-1">
                        <h4>
                            <?php echo $row["subject_name"];
                            $subject = $row["subject_id"];
                            ?>
                        </h4>
                        <form action="category.php" method="POST">
                            <?php

                            $sql = "SELECT * FROM category WHERE subject_id='$subject'";
                            $res = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                <button class="btn viral-card-2 m-3" type="submit" name="course_id"
                                    value="<?php echo $row["category_id"]; ?>"><?php echo $row["category"]; ?></button>
                            <?php }

                            ?>
                        </form>
                    </div>

                </div>
            <?php }

            ?>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>

    <?php include 'js.php'; ?>
</body>

</html>