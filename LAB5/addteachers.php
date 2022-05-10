

<!DOCTYPE html>
<html>
<head>
  <title>CRUD Table</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
 
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
	
</head>
<body>

<div class="container p-5">

<h1>Teachers Table</h1>
<hr><br><br><br>
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
<a href="crud.php">gobackto crud</a>

<table class="table table-striped" id="table_id">
	<thead>
<tr>
    <th>ID</th>
    <th>First Name</th>
	<th>Action</th>
  

  </tr>
</thead>
<tbody>
<?php
include "connection.php";
$sql = "SELECT * From teachers";
$result = $conn->query($sql);
$sqll = "Alter Table teachers Auto_increment =1";
$results = $conn->query($sqll);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  
  <tr>
    <td><?php echo $row["teacherID"]; ?></td>
    <td><?php echo $row["teacherName"]; ?></td>
     
  <td>   <div class="row"><div class="col">

      <a href="updateteacher.php?id=<?php echo $row["teacherID"]; ?>" class="btn btn-secondary">Update</a>




    </div><div class="col"> 




        <form action="delTeachers.php"> <input type="text" style="display: none;" name="idd" value="<?php echo $row["teacherID"]; ?>"><input type="submit" onclick="confirm('Are you sure you want to delete?');" class="btn btn-danger"  value="Delete"></form> </div></div></td>


</tr>
     <?php  }

 }


 ?>
</tbody>
 </table>

 <br><br><br>
 <h1> Add Teacher</h1>
 <form action="addteacherprocess.php" method="POST">
 <input type="text" name="teacher" class="form-control" required="" placeholder="Enter Name">
 <input type="submit" name="Submit" value="Add Teachers" class="btn btn-info mt-4" style="float: right;">
</form>
</div>
