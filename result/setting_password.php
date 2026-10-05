<?php
session_start();
include("../config/conns.php");

$id = $_SESSION['student_id'] ?? 0;

// student info
$q = mysqli_query($conn,"SELECT * FROM student_login WHERE student_id='$id'");
$row = mysqli_fetch_assoc($q);

// admin search variables
$student_name="";
$old_password="";
$student_id="";

if(isset($_POST['search_student'])){

$student_id = $_POST['student_id'];

$search = mysqli_query($conn,"
SELECT s.full_name, l.password
FROM students s
JOIN student_login l ON s.id = l.student_id
WHERE s.id = '$student_id'
");

if(mysqli_num_rows($search) > 0){

$data = mysqli_fetch_assoc($search);

$student_name = $data['full_name'];
$old_password = $data['password'];

}else{

echo "<div class='alert alert-danger text-center'>Student not found</div>";

}

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Password Settings</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-dark text-white d-flex justify-content-between">

<h4><i class="bi bi-gear"></i> Settings</h4>

<a href="result.php" class="btn btn-light btn-sm">
<i class="bi bi-arrow-left"></i>
</a>

</div>

<div class="card-body">

<div class="row">

<!-- STUDENT CHANGE PASSWORD -->

<div class="col-md-6">

<div class="card border-primary">

<div class="card-header bg-primary text-white">
Student Change Password
</div>

<div class="card-body">

<form method="POST" action="update_password.php">

<input type="hidden" name="type" value="student">

<label>Old Password</label>
<input type="password" name="old" class="form-control mb-2" required>

<label>New Password</label>
<input type="text" name="new" maxlength="4" class="form-control mb-2" required>

<button class="btn btn-primary w-100">
<i class="bi bi-save"></i> Save 
</button>

</form>

</div>
</div>
</div>


<!-- ADMIN RESET PASSWORD -->

<div class="col-md-6">

<div class="card border-danger">

<div class="card-header bg-danger text-white">
Admin Reset Student Password
</div>

<div class="card-body">

<!-- SEARCH STUDENT -->

<form method="POST">

<label>Student ID</label>
<input type="number" name="student_id" class="form-control mb-2" required>

<button class="btn btn-dark mb-3" name="search_student">
<i class="bi bi-search"></i> Search
</button>

</form>


<?php if($student_name!=""){ ?>

<form method="POST" action="update_password.php">

<input type="hidden" name="type" value="admin">
<input type="hidden" name="student_id" value="<?php echo $student_id; ?>">

<label>Student Name</label>
<input type="text" class="form-control mb-2" value="<?php echo $student_name; ?>" readonly>

<label>Old Password</label>
<input type="text" class="form-control mb-2" value="<?php echo $old_password; ?>" readonly>

<label>New Password</label>
<input type="text" name="new" maxlength="4" class="form-control mb-2" required>

<button class="btn btn-danger w-100">
<i class="bi bi-shield-lock"></i> Reset Password
</button>

</form>

<?php } ?>

</div>
</div>
</div>

</div>

</div>

</div>

</div>

</body>
</html>