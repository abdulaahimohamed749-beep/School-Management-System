<?php
include("../config/conns.php");
session_start();
if(!isset($_SESSION['admin'])){
    echo "<script>window.top.location='../admin/login.php';</script>";
    exit();
}

$query = mysqli_query($conn,"SELECT * FROM students ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Students Table</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-light">
<div class="container mt-5">

<h3 class="mb-3">Students List</h3>

<a href="student_register.php" class="btn btn-primary mb-3">Add New Student</a>

<table class="table table-striped table-hover">
<thead class="table-dark">
<tr>
<th>ID</th>
<th>Full Name</th>
<th>Class</th>
<th>Parent Name</th>
<th>Fee</th>
<th>Gender</th>
<th>Phone</th>
<th>Actions</th>
</tr>
</thead>

<tbody>
<?php while($row=mysqli_fetch_assoc($query)): ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['full_name'] ?></td>
<td><?= $row['class'] ?></td>
<td><?= $row['parent_name'] ?></td>
<td><?= $row['fee'] ?></td>
<td><?= $row['gender'] ?></td>
<td><?= $row['phone'] ?></td>

<td>
<!-- EDIT -->
<a href="update_student.php?id=<?= $row['id'] ?>" class="text-primary me-2">
<i class="fa-solid fa-pen-to-square"></i>
</a>

<!-- DELETE -->
<a href="delete_student.php?id=<?= $row['id'] ?>" 
class="text-danger"
onclick="return confirm('Are you sure?');">
<i class="fa-solid fa-trash"></i>
</a>
</td>

</tr>
<?php endwhile; ?>
</tbody>

</table>
</div>
</body>
</html>