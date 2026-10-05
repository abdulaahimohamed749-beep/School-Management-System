<?php
include("../config/conns.php");

$student_id="";
$full_name="";
$class="";

if(isset($_POST['search_id'])){

$student_id=$_POST['student_id'];

$q=mysqli_query($conn,"
SELECT s.id,s.full_name,s.class
FROM students s
JOIN exams e ON s.id=e.student_id
WHERE s.id='$student_id'
");

if(mysqli_num_rows($q)>0){

$row=mysqli_fetch_assoc($q);

$student_id=$row['id'];
$full_name=$row['full_name'];
$class=$row['class'];

}

}

if(isset($_POST['search_class'])){

$class=$_POST['class'];

$q=mysqli_query($conn,"
SELECT s.id,s.full_name,s.class
FROM students s
JOIN exams e ON s.id=e.student_id
WHERE s.class='$class'
LIMIT 1
");

if(mysqli_num_rows($q)>0){

$row=mysqli_fetch_assoc($q);

$student_id=$row['id'];
$full_name=$row['full_name'];
$class=$row['class'];

}

}

$class_query=mysqli_query($conn,"SELECT DISTINCT class FROM students ORDER BY class");

?>

<!DOCTYPE html>
<html>
<head>

<title>Add Student Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-dark text-white">
<h4><i class="bi bi-person-plus"></i> Add Student Login</h4>
</div>

<div class="card-body">

<!-- SEARCH ID -->

<form method="POST" class="mb-3">

<label>Search Student ID</label>

<div class="input-group">

<input type="number" name="student_id" class="form-control" placeholder="Enter Student ID">

<button class="btn btn-primary" name="search_id">
<i class="bi bi-search"></i> Search
</button>

</div>

</form>


<!-- SEARCH CLASS -->

<form method="POST" class="mb-3">

<label>Select Class</label>

<div class="input-group">

<select name="class" class="form-control">

<option value="">Select Class</option>

<?php while($c=mysqli_fetch_assoc($class_query)){ ?>

<option value="<?php echo $c['class']; ?>">
<?php echo $c['class']; ?>
</option>

<?php } ?>

</select>

<button class="btn btn-secondary" name="search_class">
<i class="bi bi-filter"></i> Filter
</button>

</div>

</form>

<hr>

<?php if($full_name!=""){ ?>

<form method="POST" action="save_login.php">

<input type="hidden" name="student_id" value="<?php echo $student_id ?>">

<div class="mb-2">

<label>Student Name</label>

<input type="text" class="form-control" value="<?php echo $full_name ?>" readonly>

</div>

<div class="mb-2">

<label>Class</label>

<input type="text" class="form-control" value="<?php echo $class ?>" readonly>

</div>

<div class="mb-2">

<label>Username</label>

<input type="text" name="username" class="form-control" value="Fadeena">

</div>

<div class="mb-2">

<label>Password</label>

<input type="text" name="password" maxlength="4" class="form-control" value="0000">

</div>

<button class="btn btn-success w-100">

<i class="bi bi-save"></i> Save Login

</button>

</form>

<?php } ?>

</div>

</div>

</div>

</body>
</html>