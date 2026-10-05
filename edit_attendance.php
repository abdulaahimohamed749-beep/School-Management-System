<?php
include("config/conns.php");

if(!isset($_GET['id'])){
    header("Location: attendance_table.php");
    exit();
}

$id = $_GET['id'];
$query = mysqli_query($conn,"SELECT attendance.*, students.full_name, students.class 
FROM attendance 
JOIN students ON attendance.student_id=students.id
WHERE attendance.id='$id'");

if(mysqli_num_rows($query)==0){
    echo "<script>alert('Attendance not found'); window.location='attendance_table.php';</script>";
    exit();
}

$row = mysqli_fetch_assoc($query);
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<div class="container mt-5">
<div class="card shadow">
<div class="card-header text-center"><h4>Edit Attendance</h4></div>
<div class="card-body">

<form method="POST" action="update_attendance.php">
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
<label>Status</label>
<select name="status" class="form-control">
<option value="P" <?php if($row['status']=='P') echo 'selected'; ?>>Present</option>
<option value="A" <?php if($row['status']=='A') echo 'selected'; ?>>Absent</option>
</select>
</div>

<button class="btn btn-success w-100">Update Attendance</button>
<a href="attendance_table.php" class="btn btn-secondary w-100 mt-2">Cancel</a>

</form>
</div>
</div>
</div>