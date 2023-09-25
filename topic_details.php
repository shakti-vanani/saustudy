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

    <div class="container">
    
        <div class="row mt-3">

            <?php
            $id = $_POST['topic_id'];
            //echo $id;
            $sql = "SELECT * FROM topics WHERE topic_id='$id'";
            $res = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                ?>
                <div class="col-md-12 col-sm-12 ">
                    <div class="card viral-card m-1 text-center p-1">
                        <h4>
                            <?php echo $row["topic"];
                            $subject = $row["topic_id"];
                            ?>
                        </h4>
                       <div class="col-sm-12 col-md-12 " disabled><?php echo $row['topic_detail']; ?></div>
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

<?php }else{
            session_destroy();
            header("Location:index.php");
        }
        
        ?>