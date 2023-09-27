<?php 
include 'admin/error.php';
session_start();
// Include database connection file
include_once('admin/controller/database/db.php');
if (!isset($_SESSION['ID'])) {
    header("Location:index.php");
    exit();
}
if(2==$_SESSION['ROLE']){
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
    <?php include 'menu.php'; ?>

    <div class="container ">
        <div class="row mt-1">
            <?php include 'slider.php'; ?>
        </div>
        <div class="row mt-1">
            <form class="mt-3" action="admin/controller/feedback_controller.php" method="POST">
                <div class="input-group mb-3">
                    <span class="input-group-text  viral-card-2 col-2">
                        <h5><i class="bi bi-journal"></i>your subject</h5>
                    </span>
                    <input type="text" name="subject" class="viral-card-1  p-2 col-10" placeholder="Add your subject">

                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text  viral-card-2 col-2">
                        <h5><i class="bi bi-journal"></i>message</h5>
                    </span>
                    <textarea name="user_message" class="textarea_editor viral-card-1 form-control border-radius-0"
                        placeholder="Enter your message..."></textarea>
                        <?php
                            $id=$_SESSION['ID'];
                        ?>    
                    <input type="number" name="user_id" class="viral-card-1  p-2 col-10" value="<?php echo $id; ?>" hidden>
                    <button type="submit" name="submit" class="btn viral-card-2 p-2 col-2">submit</button>
                </div>
            </form>
        </div>




        <?php include 'js.php'; ?>
</body>

</html>

<?php }else{
            session_destroy();
            header("Location:index.php");
        }
        
        ?>