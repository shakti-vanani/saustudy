<?php
include 'error.php';
class courses
{
    private $conn = '';
    function __construct()
    {
        include 'database/db.php';
        //$conn= new mysqli('localhost','root','','saustudy');
        $this->db = $conn;

    }
    function insert($course)
    {
        $sql = "INSERT INTO `courses`(`course`) VALUES ('$course')";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function delete($id)
    {
        $sql = "DELETE FROM `courses` WHERE `course_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function view()
    {
        $sql = "SELECT * FROM `courses`";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
}
$obj = new courses();
if (isset($_POST['submit'])) {
    $course = $_POST['course'];

    $res = $obj->insert($course);
    if ($res) {
        header("location:courses.php");
    } else {
        echo "alert('data not inserted successfully')";
    }
} elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];
    // $id=$_POST['course_id'];
    $res = $obj->delete($id);
    if ($res) {
        header("location:courses.php");
    } else {
        echo "not deleted";
    }
}

//$obj1=new courses();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin|Login</title>
    <?php include 'css.php'; ?>
</head>

<body>
    <?php include 'menu.php'; ?>

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Courses</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Courses
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row xs-pd-10-10 pd-ltr-20 mb-10 ">
                <div class="col-md-12 col-sm-12 card-box">
                    <form method="POST" action="courses.php">
                        <div class="form-group row pd-10">
                            <label class="col-sm-12 col-md-2 col-form-label">
                                <div class="title">
                                    <h4>Course Name</h4>
                                </div>
                            </label>
                            <div class="col-sm-12 col-md-8">
                                <input class="form-control" type="text" name="course" placeholder="Add New Courses">
                            </div>
                            <div class="col-sm-12 col-md-2">
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
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = $obj->view();
                            while ($row = mysqli_fetch_assoc($data)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row["course_id"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["course"]; ?>
                                    </td>
                                    <td>
                                        <form action="courses.php" method="POST">
                                            <input type="number" value="<?php echo $row["course_id"]; ?>" name="id" hidden>
                                            <button class="btn btn-primary m-3" type="submit" name="update"
                                                onclick="return confirm('are you sure to Update')">update</button>
                                        </form>
                            </td>
                            <td>
                                        <form action="courses.php" method="POST">
                                            <input type="number" value="<?php echo $row["course_id"]; ?>" name="id" hidden>
                                            <button class="btn btn-danger m-3" type="submit" name="delete"
                                                onclick="return confirm('are you sure to delete')">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="footer-wrap pd-20 mb-20 card-box">
                Saustudy Project By:[1] Shakti Vanani [2] Viral Parmar
                <a href="https://github.com/shakti-vanani" target="_blank">Shakti Vanani</a>
            </div>
        </div>
    </div>

    <?php include 'js.php'; ?>
</body>

</html>