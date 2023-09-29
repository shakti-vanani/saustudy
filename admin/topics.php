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
    include 'controller/topics_controller.php';
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
        // for select a subjects
        $("#semesterid").on("change", function() {
            var semid = $(this).val();
            $.ajax({
                url: "get.php",
                type: "POST",
                data: {
                    semid: semid
                },
                cache: false,
                success: function(data) {
                    $("#subjectid").html(data);
                }
            });

        });
        // for select a category
        $("#subjectid").on("change", function() {
            var subid = $(this).val();
            $.ajax({
                url: "get.php",
                type: "POST",
                data: {
                    subid: subid
                },
                cache: false,
                success: function(data) {
                    $("#categoryid").html(data);
                }
            });

        });
        $("#categoryid").on("change", function() {
            var cate_id = $(this).val();
            $.ajax({
                url: "get.php",
                type: "POST",
                data: {
                    cate_id: cate_id
                },
                cache: false,
                success: function(data) {
                    $("#chapterid").html(data);
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
                    <div class="row input-group mb-3">
                        <span class="input-group-text  viral-card-2  p-1 col-md-2 col-sm-12">
                            <h5><i class="bi bi-journal"></i>course select</h5>
                        </span>
                        <?php
                        $data = $obj->courseview();
                        ?>
                        <select class="viral-card-1 p-1 col-md-2 col-sm-12" name="course_id" id="courseid">
                            <option selected="">Choose course...</option>
                            <?php 
                            while($row=mysqli_fetch_assoc($data))
                            { ?>
                            <option value=<?php echo $row['course_id']; ?>><?php echo $row['course']; ?></option>
                            <?php } ?>
                        </select>
                   
                        <span class="input-group-text  viral-card-2 p-1 col-2">
                            <h5><i class="bi bi-journal"></i>semester</h5>
                        </span>
                        <select class="viral-card-1 p-1 col-2 " name="semester_id" id="semesterid">
                        <option selected="">Select Semesters...</option>
                        </select>
                  
                    
                        <span class="input-group-text  viral-card-2  p-1 col-2">
                            <h5><i class="bi bi-journal"></i>subject</h5>
                        </span>
                        <select class="viral-card-1 p-1 col-2" name="subject_id" id="subjectid">
                        <option selected="">Select Subject...</option>
                        </select>
                        </div>
                    <div class="row input-group mb-3">
                        <span class="input-group-text  viral-card-2 p-1 col-2">
                            <h5><i class="bi bi-journal"></i>category</h5>
                        </span>
                        <select class="viral-card-1 p-1 col-2" name="category_id" id="categoryid">
                        <option selected="">Select Category...</option>
                        </select>
                 
                        <span class="input-group-text  viral-card-2 p-1 col-2">
                            <h5><i class="bi bi-journal"></i>chapter</h5>
                        </span>
                        <select class="viral-card-1 p-1 col-2" name="chapters_id" id="chapterid">
                        <option selected="">Select Chapter...</option>
                        </select>
                    
                        <span class="input-group-text  viral-card-2 p-1 col-2">
                            <h5><i class="bi bi-journal"></i>topic category</h5>
                        </span>
                        <select class="viral-card-1 p-1 col-2" name="topic_category" id="topiccategory"  required>
                            <option selected="">topic category</option>
                            <option value="1">pdf</option>
                            <option value="2">video</option>
                        </select>
                    </div>
                        <div class="row input-group mb-3">
                        <span class="input-group-text  viral-card-2 p-1 col-2" id="subject">
                            <h5><i class="bi bi-journal"></i>topic</h5>
                        </span>
                        <input type="text" name="topic" class="viral-card-1  p-1  col-4" placeholder="Add New topic">
                    
                        <span class="input-group-text  viral-card-2 p-1 col-2">
                            <h5><i class="bi bi-journal"></i>topic detail</h5>
                        </span>
                        <textarea name="topic_detail" class="textarea_editor viral-card-1 form-control border-radius-0"
                            placeholder="Enter your message..."></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text  viral-card-2 col-2">
                            <h5><i class="bi bi-journal"></i>topic link</h5>
                            </span>
                            <input type="link" name="topic_link" class="viral-card-1  p-2 col-8" placeholder="topic link">
                        <button type="submit" name="submit" class="btn viral-card-2 p-2 col-2">submit</button>
                    </div>
                </form>
            </div>

        </div>


        <div class="row mt-1">
            <div class="row viral-card m-1">
                <div class="col">#</div>
                <div class="col">Courses</div>
                <div class="col">Semesters</div>
                <div class="col">Subject</div>
                <div class="col">Category</div>
                <div class="col">Chapter</div>
                <div class="col">topic_category</div>               
                <div class="col">topic</div>
                <div class="col">Action</div>
            </div>
            <?php
                $data = $obj->view();
                while ($row = mysqli_fetch_assoc($data)) {
                    ?>
            <div class="row viral-card m-1">
                <div class="col">
                    <?php echo $row["topic_id"]; ?>
                </div>
                <div class="col">
                    <?php echo $row["course"]; ?>
                </div>
                <div class="col">
                    <?php echo $row["semester"]; ?>
                </div>
                <div class="col">
                    <?php echo $row["subject_name"]; ?>
                </div>
                <div class="col">
                    <?php echo $row["category"]; ?>
                </div>
                <div class="col">
                    <?php echo $row["chapter"]; ?>
                </div>
                <div class="col">
                    <?php echo $row["topic_category"]; ?>
                </div>
                <div class="col">
                    <?php echo $row["topic"]; ?>
                </div>
                <div class="col">
                    <form action="" method="POST">
                        <input type="number" value="<?php echo $row["topic_id"]; ?>" name="id" hidden>
                        <button class="btn viral-card-edit" type="submit" name="update"
                            onclick="return confirm('are you sure to edit')"><i
                                class="bi bi-pencil-square"></i></button>

                        <button class="btn viral-card-delete" type="submit" name="delete"
                            onclick="return confirm('are you sure to delete')"><i class="bi bi-trash3"></i></button>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>



    <?php include 'js.php'; ?>
</body>

</html>

<?php } else {

    include 'logout.php';
}

?>