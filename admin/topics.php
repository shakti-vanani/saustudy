<?php
include 'error.php';
class category
{
    private $conn = '';
    function __construct()
    {
        include 'database/db.php';
        //$conn= new mysqli('localhost','root','','saustudy');
        $this->db = $conn;

    }
    function insert($course_id, $semester_id, $category)
    {
        echo $course_id;
        echo $semester_id;
        $sql = "INSERT INTO `category`(`course_id`, `semester_id`, `category`) VALUES ('$course_id','$semester_id','$category')";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function edit($id, $course_id, $semester_id, $category)
    {
        $sql = "UPDATE `category` SET `course_id`='$course_id',`semester_id`='$semester_id',`category`='$category' WHERE `category_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function delete($id)
    {
        $sql = "DELETE FROM `category` WHERE `category_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function view()
    {
        $sql = "SELECT category_id,course,semester,category FROM category INNER JOIN courses USING(course_id) INNER JOIN semesters USING(semester_id)";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function courseview()
    {
        $sql = "SELECT * FROM `courses`";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
}
$obj = new category();
if (isset($_POST['submit'])) {
    $course_id = $_POST['course_id'];
    //echo $course_id;
    $semester_id = $_POST['semester_id'];
    $category = $_POST['category'];
    $res = $obj->insert($course_id, $semester_id, $category);
    if ($res) {
        //$course_id
        header("location:category.php");
    } else {
        echo "alert('data not inserted successfully')";
    }
}
if (isset($_POST['update'])) {
    $id = $_POST['category_id'];
    $course_id = $_POST['course_id'];
    $semester_id = $_POST['semester_id'];
    $category = $_POST['category'];
    $res = $obj->edit($id, $course_id, $semester_id, $category);
    if ($res) {
        header("location:category.php");
    } else {
        echo "alert('data not updated successfully')";
    }
} elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $res = $obj->delete($id);
    if ($res) {
        header("location:category.php");
    } else {
        echo "not deleted";
    }
}

//$obj1=new category();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin|Login</title>
    <?php
    include 'css.php';
    ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</head>

<body>
    <?php include 'menu.php'; ?>

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Semesters</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    category
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row xs-pd-10-10 pd-ltr-20 mb-10 ">
                <div class="col-md-12 col-sm-12 card-box">
                    <form action="" method="POST">
                        <div class="form-group row pd-10">
                            <label class="col-sm-12 col-md-2 col-form-label">
                                <div class="title">
                                    <h4>Course Select</h4>
                                </div>
                            </label></label>
                            <div class="col-sm-12 col-md-8">
                                <select class="custom-select col-12" name="course_id" id="courseid">
                                    <option selected="">Choose course...</option>
                                    <?php
                                    $data = $obj->courseview();
                                    while ($row = mysqli_fetch_assoc($data)) {
                                        ?>
                                        <option value="<?php echo $row['course_id']; ?>"><?php echo $row["course"]; ?>
                                        </option>
                                    <?php } ?>

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row pd-10">
                            <label class="col-sm-12 col-md-2 col-form-label">
                                <div class="title">
                                    <h4>Semester Select</h4>
                                </div>
                            </label></label>
                            <div class="col-sm-12 col-md-8">

                                <select class="custom-select col-12" name="semester_id" id="semesterid">

                                </select>
                            </div>
                        </div>
                        <div class="form-group row pd-10">
                            <label class="col-sm-12 col-md-2 col-form-label">
                                <div class="title">
                                    <h4>category Select</h4>
                                </div>
                            </label></label>
                            <div class="col-sm-12 col-md-8">

                                <select class="custom-select col-12" name="category_id" id="categoryid">

                                </select>
                            </div>
                        </div>
                        <div class="form-group row pd-10">
                            <label class="col-sm-12 col-md-2 col-form-label">
                                <div class="title">
                                    <h4>Material Select</h4>
                                </div>
                            </label></label>
                            <div class="col-sm-12 col-md-8">

                                <select class="custom-select col-12" name="material_id" id="materialid">

                                </select>
                            </div>
                        </div>
                        <div class="form-group row pd-10">

                            <label class="col-sm-12 col-md-2 col-form-label">
                                <div class="title">
                                    <h4>Topic Name</h4>
                                </div>
                            </label>
                            <div class="col-sm-12 col-md-8">
                                <input class="form-control" type="text" placeholder="Add New material" name="topic">
                            </div>

                        </div>
                        <div class="form-group row pd-10">
                            <div class="html-editor col-sm-12  pd-20 card-box mb-30">
                                <h4 class="h4 text-blue">Your Topics Hear</h4>
                                <p>Simple, beautiful wysiwyg editors</p>
                                <textarea name="topic-detail" class="textarea_editor form-control border-radius-0"
                                    placeholder="Enter text ..."></textarea>

                            </div>
                            <div class="col-sm-12  p-2 text-center">
                                <button type="submit" name="submit" class="btn btn-success">submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>



            <div class="footer-wrap pd-20 mb-20 card-box">
                Saustudy Project By:[1] Shakti Vanani [2] Viral Parmar
                <a href="https://github.com/shakti-vanani" target="_blank">Shakti Vanani</a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#courseid").on("change", function () {
                var course_id = $(this).val();
                $.ajax({
                    url: "load.php",
                    type: "POST",
                    data: { course_id: course_id },
                    cache: false,
                    success: function (data) {
                        $("#semesterid").html(data);
                        //$('#categoryid').html('<option value="">select category</option>');
                    }
                });

            });
            //for select category
            $("#semesterid").on("change", function () {
                var semester_id = $(this).val();
                $.ajax({
                    url: "load.php",
                    type: "POST",
                    data: { semester_id: semester_id },
                    cache: false,
                    success: function (data) {
                        $("#categoryid").html(data);
                    }
                });

            });
            $("#categoryid").on("change", function () {
                var category_id = $(this).val();
                $.ajax({
                    url: "load.php",
                    type: "POST",
                    data: { category_id: category_id },
                    cache: false,
                    success: function (data) {
                        $("#materialid").html(data);
                    }
                });

            });

        });

    </script>

    <?php include 'js.php'; ?>
</body>