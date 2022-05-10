<?php

include "connection.php";
$teachers = mysqli_real_escape_string($conn, $_REQUEST['teacher']);
$id = mysqli_real_escape_string($conn, $_REQUEST['id']);

$sql = "UPDATE teachers set teacherName='$teachers' where teacherID=".$id;

if(mysqli_query($conn, $sql)){
  echo '<script language="javascript">';
	echo 'alert("Teachers record updated successfully")
	window.location.replace("addteachers.php");';
	echo '</script>';


} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
