<?php
include("config/conns.php");

$query=mysqli_query($conn,"
SELECT students.full_name,students.class,attendance.status,attendance.date,attendance.id
FROM attendance
JOIN students ON attendance.student_id=students.id
ORDER BY attendance.id DESC
");
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="container mt-5">

<h3 class="mb-4">Attendance List</h3>

<!-- Add New Attendance Button -->
<a href="add_new_attendance.php" class="btn btn-success mb-3">
    <i class="bi bi-plus-circle"></i> Add New Attendance
</a>

<table class="table table-bordered table-striped table-hover">
<thead class="table-dark text-center">
<tr>
<th>Name</th>
<th>Class</th>
<th>Status</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>
<tbody class="text-center">
<?php while($row=mysqli_fetch_assoc($query)){ ?>
<tr>
<td><?php echo $row['full_name']; ?></td>
<td><?php echo $row['class']; ?></td>
<td>
<?php 
if($row['status']=='P') echo '<span class="badge bg-success">Present</span>';
else echo '<span class="badge bg-danger">Absent</span>';
?>
</td>
<td><?php echo $row['date']; ?></td>
<td>
<a href="edit_attendance.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm me-1">
    <i class="bi bi-pencil-square"></i>
</a>
<a href="delete_attendance.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this attendance?');">
    <i class="bi bi-trash"></i>
</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>