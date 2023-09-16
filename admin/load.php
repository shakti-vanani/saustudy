<?php 
require 'database/db.php';
if(isset($_POST['course_id']) && !empty($_POST['course_id']))
{
//$course_id=$_POST['course_id'];
$res=mysqli_query($conn,"SELECT * FROM semesters WHERE `course_id`=".$_POST['course_id']."");
echo'<option value="">select semester</option>';
while($row=mysqli_fetch_assoc($res))
{
echo'<option value="'.$row['semester_id'].'">'.$row['semester'].'</option>';
}
}
elseif(isset($_POST['semester_id']))
{
//$semester_id=$_POST['semester_id'];
$res=mysqli_query($conn,"SELECT * FROM subjects WHERE `semester_id`=".$_POST['semester_id']."");
echo'<option value="">select subject</option>';
while($row=mysqli_fetch_assoc($res))
{
echo'<option value="'.$row['subject_id'].'">'.$row['subject_name'].'</option>';
}
} 
elseif(isset($_POST['subject_id']))
{
//$subject_id=$_POST['subject_id'];
$res=mysqli_query($conn,"SELECT * FROM category WHERE `subject_id`=".$_POST['subject_id']."");
echo'<option value="">select category</option>';
while($row=mysqli_fetch_assoc($res))
{
echo'<option value="'.$row['category_id'].'">'.$row['category'].'</option>';
}
} /*
elseif(isset($_POST['category_id']))
{
//$category_id=$_POST['category_id'];
$res=mysqli_query($conn,"SELECT * FROM material WHERE `category_id`=".$_POST['category_id']."");

echo'<option value="">select matirial</option>';

while($row=mysqli_fetch_assoc($res))
{

echo'<option value="'.$row['material_id'].'">'.$row['material'].'</option>';
} 
}*/
?>