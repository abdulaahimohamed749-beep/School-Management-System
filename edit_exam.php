<?php
include("config/conns.php");

if(!isset($_GET['id'])) {
    header("Location: exam_table.php");
    exit();
}

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM exams WHERE exam_id='$id'");
$exam = mysqli_fetch_assoc($query);

if(isset($_POST['update_exam'])){
    $tarbiyo = $_POST['tarbiyo'];
    $carabi = $_POST['carabi'];
    $english = $_POST['english'];
    $physics = $_POST['physics'];
    $maths = $_POST['maths'];
    $chemistry = $_POST['chemistry'];
    $biology = $_POST['biology'];
    $ict = $_POST['ict'];

    $update = mysqli_query($conn, "UPDATE exams SET 
        tarbiyo='$tarbiyo', carabi='$carabi', english='$english', physics='$physics',
        maths='$maths', chemistry='$chemistry', biology='$biology', ict='$ict'
        WHERE exam_id='$id'");

    if($update){
        echo "<script>alert('Exam updated successfully');window.location='exam_table.php';</script>";
    } else {
        echo "<script>alert('Error updating exam');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Exam</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<div class="card shadow">
<div class="card-header text-center"><h4>Edit Exam Marks</h4></div>
<div class="card-body">
<form method="POST">

<input type="number" name="tarbiyo" class="form-control mb-2" value="<?php echo $exam['tarbiyo']; ?>" required>
<input type="number" name="carabi" class="form-control mb-2" value="<?php echo $exam['carabi']; ?>" required>
<input type="number" name="english" class="form-control mb-2" value="<?php echo $exam['english']; ?>" required>
<input type="number" name="physics" class="form-control mb-2" value="<?php echo $exam['physics']; ?>" required>
<input type="number" name="maths" class="form-control mb-2" value="<?php echo $exam['maths']; ?>" required>
<input type="number" name="chemistry" class="form-control mb-2" value="<?php echo $exam['chemistry']; ?>" required>
<input type="number" name="biology" class="form-control mb-2" value="<?php echo $exam['biology']; ?>" required>
<input type="number" name="ict" class="form-control mb-3" value="<?php echo $exam['ict']; ?>" required>

<button name="update_exam" class="btn btn-success w-100">Update Exam</button>
<a href="exam_table.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
</form>
</div>
</div>
</div>
</body>
</html>