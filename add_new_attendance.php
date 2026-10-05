<?php
include("config/conns.php");

$classes = mysqli_query($conn,"SELECT DISTINCT class FROM students");

if(isset($_POST['select_class'])){
$class=$_POST['class'];

$students=mysqli_query($conn,"
SELECT id,full_name,class
FROM students
WHERE class='$class'
");
}

if(isset($_POST['save_attendance'])){

$class=$_POST['class'];

foreach($_POST['status'] as $id=>$status){

$day=date("l");
$date=date("Y-m-d");

mysqli_query($conn,"
INSERT INTO attendance(student_id,status,day_name,date)
VALUES('$id','$status','$day','$date')
");

}

echo "<script>alert('Attendance Saved');</script>";
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Add Attendance</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header text-center">
<h4>Add New Attendance</h4>
</div>

<div class="card-body">

<form method="POST">

<select name="class" class="form-control mb-3">

<option>Select Class</option>

<?php while($c=mysqli_fetch_assoc($classes)){ ?>

<option value="<?php echo $c['class']; ?>">

Class <?php echo $c['class']; ?>

</option>

<?php } ?>

</select>

<button class="btn btn-primary" name="select_class">

Load Students

</button>

</form>

<?php if(isset($students)){ ?>

<form method="POST">

<input type="hidden" name="class" value="<?php echo $class ?>">

<table class="table table-bordered mt-3">

<tr>

<th>Full Name</th>

<th>Attendance</th>

</tr>

<?php while($s=mysqli_fetch_assoc($students)){ ?>

<tr>

<td>

<?php echo $s['full_name']; ?>

</td>

<td>

<select name="status[<?php echo $s['id']; ?>]" class="form-control">

<option value="P">Present</option>

<option value="A">Absent</option>

</select>

</td>

</tr>

<?php } ?>

</table>

<button class="btn btn-success" name="save_attendance">

Save Attendance

</button>

</form>

<?php } ?>

</div>

</div>

</div>

</body>

</html>