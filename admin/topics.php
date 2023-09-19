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
    function insert($course_id, $semester_id,$subject_id, $category_id,$topic,$topic_detail)
    {
        $sql = "INSERT INTO `topics`(`course_id`, `semester_id`, `subject_id`, `category_id`,`topic`, `topic_detail`) VALUES ('$course_id','$semester_id','$subject_id','$category_id','$topic','$topic_detail')";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function edit($id,$course_id, $semester_id,$subject_id, $category_id,$topic,$topic_detail)
    {
        $sql = "UPDATE `topics` SET `course_id`='$course_id',`semester_id`='$semester_id',`subject_id`='$subject_id',`category_id`='$category_id',`topic`='$topic',`topic_detail`='$topic_detail' WHERE `topic_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function delete($id)
    {
        $sql = "DELETE FROM `topics` WHERE `topic_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function view()
    {
        $sql = "SELECT topic_id,course,semester,subject_name,category,topic,topic_detail,create_at,update_at FROM topics INNER JOIN courses USING(course_id) INNER JOIN semesters USING(semester_id) INNER JOIN subjects USING(subject_id) INNER JOIN category USING(category_id)";
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
    $semester_id = $_POST['semester_id'];
    $subject_id = $_POST['subject_id'];
    $category_id = $_POST['category_id'];
    $topic= $_POST['topic'];
    $topic_detail= $_POST['topic_detail'];
    $res = $obj->insert($course_id, $semester_id,$subject_id,$category_id,$topic,$topic_detail);
    if ($res) {
        header("location:topics.php");
    } else {
        echo "alert('data not inserted successfully')";
    }
}
if (isset($_POST['update'])) {
    $id = $_POST['topic_id'];
    $course_id = $_POST['course_id'];
    $semester_id = $_POST['semester_id'];
    $subject_id = $_POST['subject_id'];
    $category_id = $_POST['category_id'];
    $topic= $_POST['topic'];
    $topic_detail= $_POST['topic_detail'];
    $res = $obj->edit($id,$course_id, $semester_id,$subject_id,$category_id,$topic,$topic_detail);
    if ($res) {
        header("location:topics.php");
    } else {
        echo "alert('data not updated successfully')";
    }
} elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $res = $obj->delete($id);
    if ($res) {
        header("location:topics.php");
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
                            <h4>Topic</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Topics
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
                                    <h4>Subject Select</h4>
                                </div>
                            </label></label>
                            <div class="col-sm-12 col-md-8">
                                <select class="custom-select col-12" name="subject_id" id="subjectid">
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
                                    <h4>Topic Name</h4>
                                </div>
                            </label>
                            <div class="col-sm-12 col-md-8">
                                <input class="form-control" type="text" placeholder="Add Topic" name="topic">
                            </div>
                        </div>
                        <div class="form-group row pd-10">
                            <div class="html-editor col-sm-12  pd-20 card-box mb-30">
                                <h4 class="h4 text-blue">Your Topics Hear</h4>
                                <p>Simple, beautiful wysiwyg editors</p>
                                <textarea name="topic_detail" class="textarea_editor form-control border-radius-0"
                                    placeholder="Enter text ..."></textarea>
                            </div>
                            <div class="col-sm-12  p-2 text-center">
                                <button type="submit" name="submit" class="btn btn-success">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row xs-pd-20-10 pd-ltr-20 mb-20">
                <div class="col-md-12 col-sm-12   card-box">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Courses</th>
                                <th scope="col">Semesters</th>
                                <th scope="col">Subject</th>
                                <th scope="col">category</th>
                                <th scope="col">topic</th>
                                <th scope="col">topic_detail</th>
                                <th scope="col">create_at</th>
                                <th scope="col">update_at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = $obj->view();
                            while ($row = mysqli_fetch_assoc($data)) {
                                ?>
                            <tr>
                                <th scope="row"><?php echo $row['topic_id']; ?></th>
                                <td><?php echo $row['course']; ?></td>
                                <td><?php echo $row['semester']; ?></td>
                                <td><?php echo $row['subject_name']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php echo $row['topic']; ?></td>
                                <td><?php echo $row['topic_detail']; ?></td>
                                <td><?php echo $row['create_at']; ?></td>
                                <td><?php echo $row['update_at']; ?></td>
                                <td>
                                    <a href="" class="text-primary">
                                        <span class="micon fa fa-edit"> Edit</span>
                                    </a> | <a href="" class="text-danger"><span class="micon ion-trash-a">
                                            Delete</span></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Footer Start-->
            <?php include 'footer.php'; ?>
             <!--Footer End-->
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
                        $("#subjectid").html(data);
                    }
                });
            });
            $("#subjectid").on("change", function () {
                var subject_id = $(this).val();
                $.ajax({
                    url: "load.php",
                    type: "POST",
                    data: { subject_id: subject_id },
                    cache: false,
                    success: function (data) {
                        $("#categoryid").html(data);
                    }
                });
            });            
        });
    </script>
    <?php include 'js.php'; ?>
</body>