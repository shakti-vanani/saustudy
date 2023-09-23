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
    include 'controller/courses_controller.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Saustudy</title>
        <?php include 'css.php'; ?>
    </head>

    <body class="">
        <?php include 'menu.php'; ?>

        <div class="container  ">

            <div class="row p-2 mt-1">
                
                    <div class=" viral-card text-center">
                        <form class="mt-3" action="" method="POST">

                            <div class="input-group mb-3">
                                <span class="input-group-text  viral-card-2 " id="course"><h5><i
                                        class="bi bi-journal"></i>Course</h5></span>
                                <input type="text" name="course" class="viral-card-1 m-1 p-2 col-5" placeholder="Add New Course">
                           
                                <button type="submit" name="submit" class="btn viral-card-2 col-2">submit</button>
                            </div>
                        </form>
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
            </div>


        </div>
        <?php include 'footer.php'; ?>


        <?php include 'js.php'; ?>
    </body>

    </html>

<?php } else {

    include 'logout.php';
}

?>