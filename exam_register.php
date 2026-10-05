<?php
include("config/conns.php");
$students_query = mysqli_query($conn, "SELECT id, full_name, class FROM students ORDER BY full_name ASC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Exam</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<div class="card shadow">
<div class="card-header text-center"><h4>Add New Exam Marks</h4></div>
<div class="card-body">
<form action="save_exam.php" method="POST">

<select name="student_id" class="form-control mb-3" required>
<option value="">Select Student</option>
<?php while($row = mysqli_fetch_assoc($students_query)): ?>
<option value="<?php echo $row['id']; ?>"><?php echo $row['full_name']." (Class ".$row['class'].")"; ?></option>
<?php endwhile; ?>
</select>

<input type="number" name="tarbiyo" class="form-control mb-2" placeholder="Tarbiyo" required>
<input type="number" name="carabi" class="form-control mb-2" placeholder="Carabi" required>
<input type="number" name="english" class="form-control mb-2" placeholder="English" required>
<input type="number" name="physics" class="form-control mb-2" placeholder="Physics" required>
<input type="number" name="maths" class="form-control mb-2" placeholder="Maths" required>
<input type="number" name="chemistry" class="form-control mb-2" placeholder="Chemistry" required>
<input type="number" name="biology" class="form-control mb-2" placeholder="Biology" required>
<input type="number" name="ict" class="form-control mb-3" placeholder="ICT" required>

<button class="btn btn-success w-100">Save Exam</button>
<a href="exam_table.php" class="btn btn-secondary w-100 mt-2">Cancel</a>

</form>
</div>
</div>
</div>
</body>
</html>