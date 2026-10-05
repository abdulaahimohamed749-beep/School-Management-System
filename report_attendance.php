<?php
include("config/conns.php");

if(isset($_POST['class'])){

$class=$_POST['class'];

$result=mysqli_query($conn,"
SELECT students.full_name,attendance.status,attendance.date
FROM attendance
JOIN students ON attendance.student_id=students.id
WHERE students.class='$class'
");
}
?>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<style>
.table.table-bordered th,
.table.table-bordered td {
    background-color:green; /* midabka gudaha */
    color: white; /* font cadaan */
}
.table.table-bordered,
.table.table-bordered th,
.table.table-bordered td {
    border: 2px solid black!important; /* border buluug ah */
}
</style>


<div class="container mt-5">

<form method="POST">

<select name="class" class="form-control mb-3">

<option>Select Class</option>

<?php

$classes=mysqli_query($conn,"SELECT DISTINCT class FROM students");

while($c=mysqli_fetch_assoc($classes)){

echo "<option>".$c['class']."</option>";

}

?>

</select>

<button class="btn btn-primary">

Show Report

</button>

</form>

<?php if(isset($result)){ ?>

<table class="table table-bordered mt-4">

<tr>

<th>Name</th>

<th>Status</th>

<th>Date</th>

</tr>

<?php while($r=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $r['full_name']; ?></td>

<td><?php echo $r['status']; ?></td>

<td><?php echo $r['date']; ?></td>

</tr>

<?php } ?>

</table>

<?php } ?>

</div>