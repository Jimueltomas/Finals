<?php
include "connection.php";
$teacherName = mysqli_real_escape_string($conn, $_REQUEST['teacher']);


$sql = "INSERT INTO teachers (teacherID,teacherName)VALUES ('','$teacherName')";
if(mysqli_query($conn, $sql)){
  echo '<script language="javascript">';
	echo 'alert("Teacher added successfully")
	window.location.replace("addteachers.php");';
	echo '</script>';


} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
?>