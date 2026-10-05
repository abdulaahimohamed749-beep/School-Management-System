
<?php
include("../config/conns.php");

$monthly_fee = 20;
$student = null;

# search student
if(isset($_POST['search_student'])){

$student_id = $_POST['student_id'];

$q = mysqli_query($conn,"SELECT * FROM students WHERE id='$student_id'");

$student = mysqli_fetch_assoc($q);

}

# save fee
if(isset($_POST['save_fee'])){

$student_id = $_POST['student_id'];
$month = $_POST['month'];
$year = $_POST['year'];
$amount = $_POST['amount'];

$q = mysqli_query($conn,"SELECT balance FROM fee 
WHERE student_id='$student_id'
ORDER BY id DESC LIMIT 1");

$row = mysqli_fetch_assoc($q);

$previous_balance = $row['balance'] ?? 0;

$total_due = $monthly_fee + $previous_balance;

$new_balance = $total_due - $amount;

if($new_balance < 0){
$new_balance = 0;
}

$status = $new_balance > 0 ? "Balance" : "Paid";

mysqli_query($conn,"INSERT INTO fee(student_id,month,year,amount,status,balance)
VALUES('$student_id','$month','$year','$amount','$status','$new_balance')");

echo "<script>alert('Fee Saved Successfully');window.location='fee_table.php';</script>";

}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h4>Search Student</h4>

</div>

<div class="card-body">

<form method="POST" class="d-flex">

<input type="number" name="student_id" class="form-control me-2" placeholder="Enter Student ID">

<button class="btn btn-primary" name="search_student">Search</button>

</form>

</div>
</div>


<?php if($student){ ?>

<div class="card mt-4 shadow">

<div class="card-header bg-success text-white">

<h5>Student Information</h5>

</div>

<div class="card-body">

<table class="table table-bordered">

<tr>

<th>Full Name</th>
<th>Class</th>
<th>Original Fee</th>

</tr>

<tr>

<td><?php echo $student['full_name']; ?></td>
<td><?php echo $student['class']; ?></td>
<td>$<?php echo $monthly_fee; ?></td>

</tr>

</table>

</div>
</div>


<div class="card mt-4 shadow">

<div class="card-header bg-dark text-white">

<h5>Add Fee</h5>

</div>

<div class="card-body">

<form method="POST">

<input type="hidden" name="student_id" value="<?php echo $student['id']; ?>">

<select name="month" class="form-control mb-3">

<option>January</option>
<option>February</option>
<option>March</option>
<option>April</option>
<option>May</option>
<option>June</option>
<option>July</option>
<option>August</option>
<option>September</option>
<option>October</option>
<option>November</option>
<option>December</option>

</select>

<input type="number" name="year" class="form-control mb-3" value="<?php echo date('Y'); ?>">

<input type="number" name="amount" class="form-control mb-3" placeholder="Amount Paid">

<button class="btn btn-success w-100" name="save_fee">

Save Fee

</button>

</form>

</div>
</div>

<?php } ?>

</div>

