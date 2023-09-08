<?php
include 'error.php';
class semester
{
    private $conn = '';
    function __construct()
    {
        include 'database/db.php';
        //$conn= new mysqli('localhost','root','','saustudy');
        $this->db = $conn;

    }
    function insert($course_id,$semester)
    {
        echo $course_id;
        $sql = "INSERT INTO `semesters`(`course_id`, `semester`) VALUES ('$course_id','$semester')";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function edit($id,$course_id,$semester)
    {
        $sql="UPDATE `semesters` SET `course_id`='$course_id',`semester`='$semester' WHERE `semester_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function delete($id)
    {
        $sql = "DELETE FROM `semesters` WHERE `semester_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function view()
    {
        $sql = "SELECT * FROM `semesters`";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function courseview()
    {
    $sql="SELECT * FROM `courses`"; 
    $res=mysqli_query($this->db,$sql);
    return $res;    
    }
}
$obj = new semester();
if (isset($_POST['submit'])) {    
    $course_id=$_POST['course_id'];
    echo $course_id;
    $semester=$_POST['semester'];
    $res = $obj->insert($course_id,$semester);
    if ($res) {
        header("location:semesters.php");
    } else {
        echo "alert('data not inserted successfully')";
    }
}
if (isset($_POST['update'])) {
    $id=$_POST['semester_id'];
    $course_id=$_POST['course_id'];
    $semester = $_POST['semester'];

    $res = $obj->edit($id,$course_id,$semester);
    if ($res) {
        header("location:semesters.php");
    } else {
        echo "alert('data not updated successfully')";
    }
 } 
 elseif (isset($_POST['delete'])) {
    $id=$_POST['id'];
    $res = $obj->delete($id);
    if ($res) {
        header("location:semesters.php");
    } else {
        echo "not deleted";
    }
}

//$obj1=new semster();
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
                            <h4>Semesters</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Semesters
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row xs-pd-10-10 pd-ltr-20 mb-10 ">
                <div class="col-md-12 col-sm-12 card-box">
                    <form method="POST" action="">
                        <div class="form-group row pd-10">
                            <label class="col-sm-12 col-md-2 col-form-label">
                                <div class="title">
                                    <h4>Course Select</h4>
                                </div>
                            </label></label>
                            <div class="col-sm-12 col-md-8">
                                <?php
                                    $data = $obj->courseview();                           
                                ?>
                                <select class="custom-select col-12" name="course_id">
                                    
                                    <?php
                                       while( $row = mysqli_fetch_assoc($data))
                                       {
                                        ?>
                                    <option name="course_id" value="<?php $row['course_id']; ?>"><?php echo $row["course"]; ?></option>
                                    <?php }?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row pd-10">

                            <label class="col-sm-12 col-md-2 col-form-label">
                                <div class="title">
                                    <h4>Semester Name</h4>
                                </div>
                            </label>
                            <div class="col-sm-12 col-md-8">
                                <input class="form-control" type="text" placeholder="Add New semester" name="semester">
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
                                <th scope="col">Semesters</th>
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
                                    <?php echo $row["semester_id"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["course_id"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["semester"]; ?>
                                </td>
                                <td>

                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#course-update"
                                        type="button">
                                        Update
                                    </a>
                                    <div class="modal fade" id="course-update" tabindex="-1" role="dialog"
                                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="" method="POST">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myLargeModalLabel">
                                                            Update semester
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">
                                                            ×
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <input type="number"
                                                                value="<?php echo $row["semester_id"]; ?>"
                                                                name="semester_id">
                                                            <input type="number"
                                                                value="<?php echo $row["course_id"]; ?>"
                                                                name="course_id">
                                                            <div class="col-sm-12 col-md-4">
                                                                <div class="title">
                                                                    <h4>semester Name</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-8">
                                                                <input class="form-control p-2" type="text"
                                                                    value="<?php echo $row["semester"]; ?>"
                                                                    name="semester">
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button class="btn btn-primary m-3" type="submit" name="update">
                                                            Update </button>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <form action="" method="POST">
                                        <input type="number" value="<?php echo $row["semester_id"]; ?>" name="id"
                                            hidden>
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