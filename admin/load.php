<?php 
require 'database/db.php';
$course_id=$_POST['course_id'];
$res=mysqli_query($conn,"SELECT * FROM semesters WHERE `course_id`='$course_id'");
?>
<option value="">select semester</option>
<?php 
while($row=mysqli_fetch_assoc($res))
{
?>
    <option value="<?php echo $row['semester_id']; ?>"><?php echo $row['semester']; ?></option>';
<?php } ?>

