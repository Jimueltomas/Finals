<?php
include "connection.php";
$id = mysqli_real_escape_string($conn, $_REQUEST['idd']);


$sql = "DELETE from teachers where teacherID=".$id;
if(mysqli_query($conn, $sql)){
  echo '<script language="javascript">';
	echo 'alert("Teachers record deleted successfully")
	window.location.replace("addteachers.php");';
	echo '</script>';


} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
?>