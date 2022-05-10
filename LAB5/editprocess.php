<?php
include "connection.php";
$firstName = mysqli_real_escape_string($conn, $_REQUEST['firstName']);
$lastName = mysqli_real_escape_string($conn, $_REQUEST['lastName']);
$age = mysqli_real_escape_string($conn, $_REQUEST['age']);
$year = mysqli_real_escape_string($conn, $_REQUEST['year']);
$address = mysqli_real_escape_string($conn, $_REQUEST['address']);
$id = mysqli_real_escape_string($conn, $_REQUEST['id']);

$sql = "UPDATE students set firstName='$firstName', lastName='$lastName' , age='$age', year='$year',address='$address' where studentID=".$id;

if(mysqli_query($conn, $sql)){
  echo '<script language="javascript">';
	echo 'alert("Student record updated successfully")
	window.location.replace("crud.php");';
	echo '</script>';


} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
?>