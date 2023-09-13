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
    function insert($course_id,$semester_id,$category)
    {
        echo $course_id; echo $semester_id;
        $sql = "INSERT INTO `category`(`course_id`, `semester_id`, `category`) VALUES ('$course_id','$semester_id','$category')";
        $res = mysqli_query($this->db, $sql);
        return $res;
    }
    function edit($id,$course_id,$semester_id,$category)
    {
        $sql="UPDATE `category` SET `course_id`='$course_id',`semester_id`='$semester_id',`category`='$category' WHERE `category_id`='$id'";
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
    $sql="SELECT * FROM `courses`"; 
    $res=mysqli_query($this->db,$sql);
    return $res;    
    }
}
$obj = new category();
if (isset($_POST['submit'])) {    
    $course_id=$_POST['course_id'];
    //echo $course_id;
    $semester_id=$_POST['semester_id'];
    $category=$_POST['category'];
    $res = $obj->insert($course_id,$semester_id,$category);
    if ($res) {
        //$course_id
       header("location:category.php");
    } else {
        echo "alert('data not inserted successfully')";
    }
}
if (isset($_POST['update'])) {
    $id=$_POST['category_id'];
    $course_id=$_POST['course_id'];
    $semester_id = $_POST['semester_id'];
    $category=$_POST['category'];
    $res = $obj->edit($id,$course_id,$semester_id,$category);
    if ($res) {
        header("location:category.php");
    } else {
        echo "alert('data not updated successfully')";
    }
 } 
 elseif (isset($_POST['delete'])) {
    $id=$_POST['id'];
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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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
                                <select class="custom-select col-12" name="course_id" id="courseid" >
                                    <option selected="">Choose course...</option>
                                    <?php
                                     $data = $obj->courseview();                        
                                       while( $row = mysqli_fetch_assoc($data))
                                       {
                                    ?>
                                    <option value="<?php echo $row['course_id']; ?>" ><?php echo $row["course"]; ?>
                                    </option>
                                    <?php   } ?>
                                     
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
                                    <h4>Category Name</h4>
                                </div>
                            </label>
                            <div class="col-sm-12 col-md-8">
                                <input class="form-control" type="text" placeholder="Add New Category" name="category">
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
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = $obj->view();
                            while ($row = mysqli_fetch_assoc($data)) {
                                ?>
                            <tr>
                                <th scope="row"><?php echo $row['category_id']; ?></th>
                                <td><?php echo $row['course']; ?></td>
                                <td><?php echo $row['semester']; ?></td>
                                <td><?php echo $row['category']; ?></td>
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
        $(document).ready(function(){
            $('#courseid').on('change',function(){
                var course_id=$(this).val();
               // var post_id = 'id='+ course_id;
                $.ajax({
                    url :"load.php",
                    type :"POST",
                    data: {course_id:course_id},
                    cache: false,
                    success:function(data){
                        $("#semesterid").html(data);
                    }


                });

            });

        });

        </script>
<?php include 'js.php'; ?>
</body>

</html>