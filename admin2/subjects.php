<?php
//include 'error.php';

session_start();
// Include database connection file
include_once('controller/database/db.php');
if (!isset($_SESSION['ID'])) {
    include 'logout.php';
    exit();
}
if (0 == $_SESSION['ROLE']) {
    include 'controller/subjects_controller.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saustudy</title>
    <?php include 'css.php'; ?>
    
    <script type="text/javascript">
    $(document).ready(function() {
        $('#courseid').on('change', function() {
            var cid = $(this).val();
            $.ajax({
                url: "get.php",
                type: "POST",
                data: {
                    cid: cid
                },
                cache: false,
                success: function(data) {
                    $("#semesterid").html(data);
                }
            });

        });
    });
    </script>
</head>

<body class="">
    <?php include 'menu.php'; ?>

    <div class="container">

        <div class="row p-2 mt-1">

            <div class=" viral-card text-center">
                <form class="mt-3" action="" method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text  viral-card-2 col-2">
                            <h5><i class="bi bi-journal"></i>course select</h5>
                        </span>
                        <?php
                        $data = $obj->courseview();
                        ?>
                        <select class="viral-card-1 p-2 col-10" name="course_id" id="courseid">
                            <option selected="">select course</option>
                            <?php 
                            while($row=mysqli_fetch_assoc($data))
                            { ?>
                            <option value=<?php echo $row['course_id']; ?>><?php echo $row['course']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text  viral-card-2 col-2">
                            <h5><i class="bi bi-journal"></i>semester</h5>
                        </span>
                        <select class="viral-card-1 p-2 col-10 " name="semester_id" id="semesterid">
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text  viral-card-2 col-2" id="subject">
                            <h5><i class="bi bi-journal"></i>subject</h5>
                        </span>
                        <input type="text" name="subject" class="viral-card-1  p-2 col-8" placeholder="Add New subject">

                        <button type="submit" name="submit" class="btn viral-card-2 p-2 col-2">submit</button>
                    </div>
                </form>
            </div>

        </div>
        <?php /*
          $data = $obj->view();
          while ($row = mysqli_fetch_assoc($data)){
             ?>
        <div class="col-lg-4 col-md-4 col-sm-12 ">
            <div class="card viral-card m-1 text-center p-1">
                <h4>
                    <?php echo $row["username"]; ?>
                </h4>
                <div class="">
                    <p><?php echo $row["fname"]; ?></p>
                    <p><?php echo $row["lname"]; ?></p>
                    <p><?php echo $row["email"]; ?></p>
                </div>

            </div>

        </div>
        <?php  } */
            ?>
        <div class="row mt-1">
            <?php
                $data = $obj->view();
                while ($row = mysqli_fetch_assoc($data)) {
                    ?>
            <div class="col-lg-4 col-md-4 col-sm-12 ">
                <div class="card viral-card m-1 text-center p-1">
                    <h4>
                        <?php echo $row["username"]; ?>
                    </h4>
                    <div class="">
                        <p>
                            <?php echo $row["subject_id"]; ?>
                        </p>
                        <p>
                            <?php echo $row["course"]; ?>
                        </p>
                        <p>
                            <?php echo $row["semester"]; ?>
                        </p>
                        <p>
                            <?php echo $row["subject_name"]; ?>
                        </p>
                        <form action="" method="POST">
                            <input type="number" value="<?php echo $row["subject_id"]; ?>" name="id" hidden>
                            <button class="btn viral-card-edit" type="submit" name="update"
                                onclick="return confirm('are you sure to edit')"><i
                                    class="bi bi-pencil-square"></i></button>

                            <button class="btn viral-card-delete" type="submit" name="delete"
                                onclick="return confirm('are you sure to delete')"><i class="bi bi-trash3"></i></button>
                        </form>
                    </div>

                </div>

            </div>
            <?php }
                ?>
        </div>


    </div>



    <?php include 'js.php'; ?>
</body>

</html>

<?php } else {

    include 'logout.php';
}

?>