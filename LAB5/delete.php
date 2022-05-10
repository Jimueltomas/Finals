<?php
include "connection.php";
$id = mysqli_real_escape_string($conn, $_REQUEST['idd']);


$sql1 = "DELETE from grades where studentID=".$id;
$sql = "DELETE from students where studentID=".$id;

if(mysqli_query($conn, $sql)&&mysqli_query($conn, $sql1)){
  echo '<script language="javascript">';
	echo 'alert("Student record deleted successfully")
	window.location.replace("crud.php");';
	echo '</script>';


} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
?>