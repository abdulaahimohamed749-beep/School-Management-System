<?php
include("config/conns.php");

$class_filter = isset($_GET['class']) ? $_GET['class'] : '';
$student_filter = isset($_GET['student_id']) ? $_GET['student_id'] : '';

$query = "SELECT * FROM exams WHERE 1";

if($class_filter != '') {
    $query .= " AND class='$class_filter'";
}

if($student_filter != '') {
    $query .= " AND student_id='$student_filter'";
}

$exams = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Exam Report</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">

<h3>Exam Report</h3>

<form method="GET" class="mb-3">
<select name="class" class="form-control mb-2">
<option value="">Select Class</option>
<?php for($i=1;$i<=12;$i++): ?>
<option value="<?php echo $i; ?>" <?php if($class_filter==$i) echo "selected"; ?>>Class <?php echo $i; ?></option>
<?php endfor; ?>
</select>

<input type="text" name="student_id" class="form-control mb-2" placeholder="Student ID" value="<?php echo $student_filter; ?>">

<button class="btn btn-primary w-100">Filter Report</button>
</form>

<table class="table table-striped table-bordered table-hover">
<thead class="table-dark">
<tr>
<th>ID</th>
<th>Student</th>
<th>Class</th>
<th>Total</th>
<th>Average</th>
<th>Grade</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<?php while($row=mysqli_fetch_assoc($exams)): ?>
<tr>
<td><?php echo $row['exam_id']; ?></td>
<td><?php echo $row['full_name']; ?></td>
<td><?php echo $row['class']; ?></td>
<td><?php echo $row['total']; ?></td>
<td><?php echo $row['average']; ?></td>
<td><?php echo $row['grade']; ?></td>
<td><?php echo $row['status']; ?></td>
</tr>
<?php endwhile; ?>
</tbody>
</table>

</div>
</body>
</html>