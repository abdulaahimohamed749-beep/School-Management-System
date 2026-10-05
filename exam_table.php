<?php
include("config/conns.php");
$exams = mysqli_query($conn, "SELECT * FROM exams ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Exam Table</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">
<div class="container mt-5">

<h3 class="mb-4">Exam Records</h3>
<a href="exam_register.php" class="btn btn-primary mb-3">Add New Exam</a>

<table class="table table-striped table-bordered table-hover">
<thead class="table-dark">
<tr>
<th>ID</th>
<th>Student Name</th>
<th>Class</th>
<th>Total</th>
<th>Average</th>
<th>Grade</th>
<th>Status</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php while($row = mysqli_fetch_assoc($exams)): ?>
<tr>
<td><?php echo $row['exam_id']; ?></td>
<td><?php echo $row['full_name']; ?></td>
<td><?php echo $row['class']; ?></td>
<td><?php echo $row['total']; ?></td>
<td><?php echo $row['average']; ?></td>
<td><?php echo $row['grade']; ?></td>
<td><?php echo $row['status']; ?></td>
<td>
<a href="edit_exam.php?id=<?php echo $row['exam_id']; ?>" class="text-primary me-2"><i class="bi bi-pencil-square"></i></a>
<a href="delete_exam.php?id=<?php echo $row['exam_id']; ?>" class="text-danger"><i class="bi bi-trash"></i></a>
</td>
</tr>
<?php endwhile; ?>
</tbody>
</table>

</div>
</body>
</html>