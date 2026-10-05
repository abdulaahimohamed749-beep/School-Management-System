<?php
session_start();
include("../config/conns.php");

if(!isset($_SESSION['student_id'])){
    header("Location: login.php");
    exit();
}

$id = $_SESSION['student_id'];

$sql = "SELECT s.full_name, s.class, e.*
        FROM exams e
        JOIN students s ON e.student_id = s.id
        WHERE e.student_id='$id'";

$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>

<title>Student Result</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<!-- HEADER -->

<div class="card-header bg-success text-white d-flex justify-content-between align-items-center">

<h4>
<i class="bi bi-person-circle"></i>
Welcome Result Student
</h4>

<div>

<a href="setting_password.php" class="btn btn-dark btn-sm me-1">
<i class="bi bi-gear"></i> Change Password
</a>

<a href="logout.php" class="btn btn-danger btn-sm">
<i class="bi bi-box-arrow-right"></i> Logout
</a>

</div>

</div>


<div class="card-body">

<!-- STUDENT INFO BOXES -->

<div class="row mb-4">

<div class="col-md-6">

<div class="card border-primary shadow-sm">

<div class="card-body text-center">

<h6 class="text-muted">Student Name</h6>

<h5 class="text-primary">
<?php echo $row['full_name']; ?>
</h5>

</div>

</div>

</div>


<div class="col-md-6">

<div class="card border-info shadow-sm">

<div class="card-body text-center">

<h6 class="text-muted">Class</h6>

<h5 class="text-info">
<?php echo $row['class']; ?>
</h5>

</div>

</div>

</div>

</div>


<!-- RESULT TABLE -->

<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>
<th>Subject</th>
<th>Marks</th>
</tr>

</thead>

<tbody>

<tr><td>Tarbiyo</td><td><?php echo $row['tarbiyo']; ?></td></tr>
<tr><td>Carabi</td><td><?php echo $row['carabi']; ?></td></tr>
<tr><td>English</td><td><?php echo $row['english']; ?></td></tr>
<tr><td>Physics</td><td><?php echo $row['physics']; ?></td></tr>
<tr><td>Maths</td><td><?php echo $row['maths']; ?></td></tr>
<tr><td>Chemistry</td><td><?php echo $row['chemistry']; ?></td></tr>
<tr><td>Biology</td><td><?php echo $row['biology']; ?></td></tr>
<tr><td>ICT</td><td><?php echo $row['ict']; ?></td></tr>

<tr class="table-primary">
<td><strong>Total</strong></td>
<td><strong><?php echo $row['total']; ?></strong></td>
</tr>

<tr>
<td>Average</td>
<td><?php echo $row['average']; ?></td>
</tr>

<tr>
<td>Grade</td>
<td><?php echo $row['grade']; ?></td>
</tr>

<tr>
<td>Status</td>
<td><?php echo $row['status']; ?></td>
</tr>

</tbody>

</table>

</div>

</div>

</div>

</body>
</html>