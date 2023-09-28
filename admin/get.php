<?php 
require 'controller/database/db.php';
if(isset($_POST['cid']))
{
//$course_id=$_POST['cid'];
$res=mysqli_query($conn,"SELECT * FROM semesters WHERE `course_id`=".$_POST['cid']."");
echo'<option value="">select semester</option>';
while($row=mysqli_fetch_assoc($res))
{   
echo'<option value="'.$row['semester_id'].'">'.$row['semester'].'</option>';
}
}
elseif(isset($_POST['semid']))
{
//$semester_id=$_POST['semid'];
$res=mysqli_query($conn,"SELECT * FROM subjects WHERE `semester_id`=".$_POST['semid']."");
echo'<option value="">select subject</option>';
while($row=mysqli_fetch_assoc($res))
{
echo'<option value="'.$row['subject_id'].'">'.$row['subject_name'].'</option>';
}
} 
elseif(isset($_POST['subid']))
{
//$subject_id=$_POST['subject_id'];
$res=mysqli_query($conn,"SELECT * FROM category WHERE `subject_id`=".$_POST['subid']."");
echo'<option value="">select category</option>';
while($row=mysqli_fetch_assoc($res))
{
echo'<option value="'.$row['category_id'].'">'.$row['category'].'</option>';
}
}
elseif(isset($_POST['cate_id']))
{
//$category_id=$_POST['cate_id'];
$res=mysqli_query($conn,"SELECT * FROM chapters WHERE `category_id`=".$_POST['cate_id']."");

echo'<option value="">select chapter</option>';

while($row=mysqli_fetch_assoc($res))
{

echo'<option value="'.$row['chapter_id'].'">'.$row['chapter'].'</option>';
} 
}
?>