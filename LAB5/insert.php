<?php
include "connection.php";
$first_name = mysqli_real_escape_string($conn, $_REQUEST['firstName']);	
$studentID = mysqli_real_escape_string($conn, $_REQUEST['studentID']);	
$last_name = mysqli_real_escape_string($conn, $_REQUEST['lastName']);	
$age = mysqli_real_escape_string($conn, $_REQUEST['age']);	
$year = mysqli_real_escape_string($conn, $_REQUEST['year']);	
$address = mysqli_real_escape_string($conn, $_REQUEST['address']);	
$grade = mysqli_real_escape_string($conn, $_REQUEST['grade']);	
$teacher = mysqli_real_escape_string($conn, $_REQUEST['teacher']);	

$sql = "INSERT INTO students (firstName, lastName, age,address,year,teacherID) VALUES ('$first_name', '$last_name','$age','$address','$year','$teacher')";
$sql1="INSERT INTO grades (studentID,gradeValue) VALUES('$studentID','$grade')";
if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)){
  echo '<script language="javascript">';
	echo 'alert("Added successfully")
	window.location.replace("crud.php");';
	echo '</script>';


} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
?>