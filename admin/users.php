<?php
include 'error.php';
class users
{
    private $conn = '';
    function __construct()
    {
        include 'database/db.php';
        //$conn= new mysqli('localhost','root','','saustudy');
        $this->db = $conn;

    }
    /*function insert($course)
    {
        $sql = "INSERT INTO `courses`(`course`) VALUES ('$course')";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function update($id, $course)
    {
        $sql = "UPDATE `courses` SET `course`='$course' WHERE `course_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function delete($id)
    {
        $sql = "DELETE FROM `courses` WHERE `course_id`='$id'";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }*/
    function view()
    {
            
        $sql = "SELECT * FROM `users`";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
}
$obj = new users();
if (isset($_POST['submit'])) {
    $course = $_POST['course'];

    $res = $obj->insert($course);
    if ($res) {
        header("location:courses.php");
    } else {
        echo "alert('data not inserted successfully')";
    }
}
if (isset($_POST['update'])) {
    $id = $_POST['course_id'];
    $course = $_POST['course'];

    $res = $obj->update($id, $course);
    if ($res) {
        header("location:courses.php");
    } else {
        echo "alert('data not updated successfully')";
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
                            <h4>Users</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Users
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
           

            <div class="row xs-pd-20-10 pd-ltr-20 mb-20">
                <div class="col-md-12 col-sm-12   card-box">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">fname</th>
                                <th scope="col">lname</th>
                                <th scope="col">email</th>
                                <th scope="col">Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = $obj->view();
                            while ($row = mysqli_fetch_assoc($data)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row["id"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["fname"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["lname"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["email"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $row["username"]; ?>
                                    </td>
                                    
                                    <td>
                                        <form action="" method="POST">
                                            <input type="number" value="<?php echo $row["id"]; ?>" name="id" hidden>
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