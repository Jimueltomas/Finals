


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

<h1>Students Table</h1>
<hr><br><br><br>
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>


<table class="table table-striped" id="table_id">
	<thead>
<tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Age</th>
    <th>Address</th>
    <th>Year</th>
    <th>Grade</th>   
    <th>Teacher</th>
    <th>Action</th>

  </tr>
</thead>
<tbody>
<?php
include "connection.php";
$sql = "Select students.studentID,students.firstName,students.lastName,students.age,students.address,students.year,grades.gradeValue,teachers.teacherName From students INNER JOIN grades on students.studentID=grades.studentID INNER JOIN teachers ON students.teacherID=teachers.teacherID";
$result = $conn->query($sql);
$query = "Alter table students AUTO_INCREMENT=1";
$results = $conn->query($query);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
  
  <tr>

    <td><?php echo $row["studentID"]; ?></td>
    <td><?php echo $row["firstName"]; ?></td>
     <td><?php echo $row["lastName"]; ?></td>
    <td><?php echo $row["age"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
    <td><?php echo $row["year"]; ?></td>
    <td><?php echo $row["gradeValue"]; ?></td>  
    <td><?php echo $row["teacherName"]; ?></td>  

    <td>   <div class="row"><div class="col">

      <a href="updateStudent.php?id=<?php echo $row["studentID"]; ?>" class="btn btn-secondary">Update</a>




    </div><div class="col"> 




        <form action="delete.php"> <input type="text" style="display: none;" name="idd" value="<?php echo $row["studentID"]; ?>"><input type="submit" onclick="confirm('Are you sure you want to delete?');" class="btn btn-danger"  value="Delete"></form> </div></div></td>

</tr>
     <?php  }

 }


 ?>
</tbody>
 </table>
</div>



<div class="container">
  
<a href="addteachers.php">go to add teachers</a>
<h1> Add Student's Grade</h1>
<form action="insert.php" method="POST">
  <label for="firstName">Student ID:</label>
    <?php
$sql="SELECT * FROM students";

if ($result=mysqli_query($conn,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result) +1;
  ?>

  <input type="text" readonly="" style="width: 50%;" name="studentID" value="<?php echo $rowcount; ?>" class="form-control">

  <?php 
  mysqli_free_result($result);
  }

?> 
<hr>
<div class="row">
  <div class="col">
  <input type="text" name="firstName" placeholder="Enter FirstName" required="" class="form-control"><br>
  <input type="number" name="age" placeholder="Enter Age" min="1" max="100"  required="" class="form-control">
  </div>

  <div class="col">
    <input type="text" name="lastName" placeholder="Enter LastName" required="" class="form-control">
    <br>
     <input type="text" name="year" placeholder="Enter Year"  required="" class="form-control">
  </div>
</div>
<br>
<textarea name="address" placeholder="Enter Address" rows="3" required="" class="form-control"></textarea>
<input type="number" name="grade" min="0" max="100" placeholder="Enter Grade" required="" class="form-control mt-4">

<br>
<select name="teacher" class="form-control" required=""> 
<option value="">---Select Teacher---</option>
<?php
  include "connection.php";
  $sql1 = "SELECT * FROM teachers";
  $result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  // output data of each row
  while($row1 = $result1->fetch_assoc()) {
?>
  

    <option value="<?php echo $row1["teacherID"]; ?>"><?php echo $row1["teacherName"]; ?></option>


  <?php  }

 }


 ?>
</select>
<input type="submit" value="Add Grades" class="btn btn-primary mt-4" style="float: right;">
</form>
<br><br><br><br><br><br>
</body>
</html>

