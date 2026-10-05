
<?php
include("../config/conns.php");

$id = $_GET['id'];

$query = mysqli_query($conn,"
SELECT f.*, s.full_name, s.class
FROM fee f
JOIN students s ON f.student_id = s.id
WHERE f.id='$id'
");

$row = mysqli_fetch_assoc($query);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">
<h4>Edit Student Fee</h4>
</div>

<div class="card-body">

<form action="update_fee.php" method="POST">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<div class="mb-3">
<label>Student Name</label>
<input type="text" class="form-control" value="<?php echo $row['full_name']; ?>" readonly>
</div>

<div class="mb-3">
<label>Class</label>
<input type="text" class="form-control" value="<?php echo $row['class']; ?>" readonly>
</div>

<div class="mb-3">
<label>Month</label>
<input type="text" name="month" class="form-control" value="<?php echo $row['month']; ?>">
</div>

<div class="mb-3">
<label>Year</label>
<input type="number" name="year" class="form-control" value="<?php echo $row['year']; ?>">
</div>

<div class="mb-3">
<label>Amount Paid</label>
<input type="number" name="amount" class="form-control" value="<?php echo $row['amount']; ?>">
</div>

<button class="btn btn-success w-100">
Update Fee
</button>

<a href="fee_table.php" class="btn btn-secondary w-100 mt-2">
Cancel
</a>

</form>

</div>

</div>

</div>

