<?php
include("../config/conns.php");
session_start();
if(!isset($_SESSION['admin'])){
    echo "<script>window.top.location='../admin/login.php';</script>";
    exit();
}
$class_filter = isset($_GET['class'])?$_GET['class']:'';
$search_id = isset($_GET['id'])?$_GET['id']:'';

$sql = "SELECT * FROM students WHERE 1";
if($class_filter != '') $sql .= " AND class='$class_filter'";
if($search_id != '') $sql .= " AND id='$search_id'";
$sql .= " ORDER BY id DESC";
$query = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Report Students</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<h3>Students Report</h3>
<form method="GET" class="row g-2 mb-3">
    <div class="col-md-4">
        <select name="class" class="form-control">
            <option value="">All Classes</option>
            <?php for($i=1;$i<=12;$i++): ?>
                <option value="<?= $i ?>" <?= $i==$class_filter?'selected':'' ?>><?= $i ?></option>
            <?php endfor; ?>
        </select>
    </div>
    <div class="col-md-4">
        <input type="number" name="id" class="form-control" placeholder="Search by ID" value="<?= $search_id ?>">
    </div>
    <div class="col-md-4">
        <button class="btn btn-primary w-100">Filter/Search</button>
    </div>
</form>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Class</th>
            <th>Parent Name</th>
            <th>Fee</th>
            <th>Gender</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row=mysqli_fetch_assoc($query)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['full_name'] ?></td>
            <td><?= $row['class'] ?></td>
            <td><?= $row['parent_name'] ?></td>
            <td><?= $row['fee'] ?></td>
            <td><?= $row['gender'] ?></td>
            <td><?= $row['phone'] ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</div>
</body>
</html>