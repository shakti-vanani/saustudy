<?php
include 'admin/error.php';
session_start();
// Include database connection file
include_once('admin/controller/database/db.php');
if (!isset($_SESSION['ID'])) {
    header("Location:index.php");
    exit();
}
if (2 == $_SESSION['ROLE']) {
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
            <div class="card col-12 viral-card m-3 text-center p-1"><h3>PDF</h3></div>
                <?php
                $id = $_POST['chapter_id'];
                $tid=1;
                $sql = "SELECT * FROM topics WHERE chapter_id='$id' AND topic_category='$tid'";
                $res = mysqli_query($conn, $sql);
                
                while ($row = mysqli_fetch_assoc($res)) {
                    ?>

                    <div class="col-md-2 col-sm-12 mt-3">
                    
                        <div class="card viral-card m-1 text-center p-1">
                           
                            <h4>
                                <?php echo $row["topic"];
                                $subject = $row["topic_id"];
                                ?>
                            </h4>
                           <a href="">
                            <img src="asset/images/pdf.png" alt="" height="100px" width="100px" srcset="">
                           </a>
                        </div>

                    </div>
                <?php }

                ?>
            </div>
            <div class="row mt-3">
            <div class="card col-12 viral-card m-3 text-center p-1"><h3>Video</h3></div>
                <?php
                $id = $_POST['chapter_id'];
                $tid=2;
                $sql = "SELECT * FROM topics WHERE chapter_id='$id' AND topic_category='$tid'";
                $res = mysqli_query($conn, $sql);
                
                while ($row = mysqli_fetch_assoc($res)) {
                    ?>

                    <div class="col-md-4 col-sm-12 mt-3">
                    
                        <div class="card viral-card m-1 text-center p-1">
                           
                            <h4>
                                <?php echo $row["topic"];

                                $subject = $row["topic_id"];
                                ?>
                            </h4>

                            <div class="embed-responsive ">
                            <iframe class="embed-responsive-item" width="400" height="315"  src="<?php echo $row['topic_link']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay;  encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
                           </div>
                           
                        </div>

                    </div>
                <?php }

                ?>
            </div>
            <div class="row mt-3">
            <div class="card col-12 viral-card m-1 text-center p-1"><h3>Extra</h3></div>
                <?php
                $id = $_POST['chapter_id'];
                $tid=3;
                $sql = "SELECT * FROM topics WHERE chapter_id='$id' AND topic_category='$tid'";
                $res = mysqli_query($conn, $sql);
                
                while ($row = mysqli_fetch_assoc($res)) {
                    ?>

                    <div class="col-md-4 col-sm-12 ">
                    
                        <div class="card viral-card m-1 text-center p-1">
                           
                            <h4>
                                <?php echo $row["topic"];

                                $subject = $row["topic_id"];
                                ?>
                            </h4>

                            <div class="embed-responsive ">
                            <iframe class="embed-responsive-item" width="400" height="315"  src="<?php echo $row['topic_link']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay;  encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
                           </div>
                           
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

<?php } else {
    session_destroy();
    header("Location:index.php");
}

?>