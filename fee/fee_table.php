
<?php
include("../config/conns.php");

$search = $_GET['search'] ?? '';

$sql = "SELECT f.*, s.full_name, s.class, s.phone
FROM fee f
JOIN students s ON f.student_id = s.id";

if($search != ""){
$sql .= " WHERE s.id='$search'";
}

$sql .= " ORDER BY f.id DESC";

$query = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>

<title>Fee Records</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">

<h4>Student Fee Records</h4>

<div class="d-flex">

<form method="GET" class="d-flex me-2">

<input type="number" name="search" class="form-control me-2" placeholder="Search Student ID">

<button class="btn btn-primary">
<i class="bi bi-search"></i>
</button>

</form>

<a href="add_fee.php" class="btn btn-success">

<i class="bi bi-plus-circle"></i> Add New Fee

</a>

</div>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Name</th>
<th>Class</th>
<th>Phone</th>
<th>Month</th>
<th>Year</th>
<th>Paid</th>
<th>Status</th>
<th>Balance</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($query)){ ?>

<tr>

<td><?php echo $row['student_id']; ?></td>

<td><?php echo $row['full_name']; ?></td>

<td><?php echo $row['class']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['month']; ?></td>

<td><?php echo $row['year']; ?></td>

<td>$<?php echo $row['amount']; ?></td>

<td>

<?php
if($row['balance'] == 0){
echo "<span class='badge bg-success'>Paid</span>";
}else{
echo "<span class='badge bg-danger'>Balance</span>";
}
?>

</td>

<td>

<?php
if($row['balance'] == 0){
echo "<span class='text-success fw-bold'>0</span>";
}else{
echo "<span class='text-danger fw-bold'>$".$row['balance']."</span>";
}
?>

</td>

<td>

<a href="edit_fee.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">

<i class="bi bi-pencil-square"></i>

</a>
<br>
<br>

<a href="delete_fee.php?id=<?php echo $row['id']; ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this fee record?')">

<i class="bi bi-trash"></i>

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</body>
</html>

