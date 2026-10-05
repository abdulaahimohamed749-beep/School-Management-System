<?php
include("../config/conns.php");
session_start();
if(!isset($_SESSION['admin'])){
    echo "<script>window.top.location='../admin/login.php';</script>";
    exit();

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Register New Student</h4>
                </div>
                <div class="card-body">
                    <form action="save_student.php" method="POST">
                        <input type="text" name="full_name" class="form-control mb-3" placeholder="Full Name" required>
                        <select name="class" class="form-control mb-3" required>
                            <option value="">Select Class</option>
                            <?php for($i=1;$i<=12;$i++): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                        <input type="text" name="parent_name" class="form-control mb-3" placeholder="Parent Name" required>
                        <input type="number" name="fee" class="form-control mb-3" placeholder="Fee" required>
                        <select name="gender" class="form-control mb-3" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <input type="text" name="phone" class="form-control mb-3" placeholder="Phone" required>
                        <button class="btn btn-success w-100">Save Student</button>
                        <a href="student_table.php" class="btn btn-secondary w-100 mt-2">View Students</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>