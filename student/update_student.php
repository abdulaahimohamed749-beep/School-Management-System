<?php
include("../config/conns.php");
session_start();
if(!isset($_SESSION['admin'])){
    echo "<script>window.top.location='../admin/login.php';</script>";
    exit();
}

/* GET DATA */
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = mysqli_query($conn,"SELECT * FROM students WHERE id='$id'");
    $row = mysqli_fetch_assoc($result);
}

/* UPDATE */
if($_SERVER['REQUEST_METHOD']=="POST"){

    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $class = $_POST['class'];
    $parent_name = $_POST['parent_name'];
    $fee = $_POST['fee'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];

    mysqli_query($conn,"UPDATE students SET
    full_name='$full_name',
    class='$class',
    parent_name='$parent_name',
    fee='$fee',
    gender='$gender',
    phone='$phone'
    WHERE id='$id'");

    header("Location: student_table.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Update Student</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="container mt-4">

<h3>Update Student</h3>

<form method="POST">

<input type="hidden" name="id" value="<?= $row['id'] ?>">

<input type="text" name="full_name" value="<?= $row['full_name'] ?>" class="form-control mb-2">
<input type="text" name="class" value="<?= $row['class'] ?>" class="form-control mb-2">
<input type="text" name="parent_name" value="<?= $row['parent_name'] ?>" class="form-control mb-2">
<input type="number" name="fee" value="<?= $row['fee'] ?>" class="form-control mb-2">

<select name="gender" class="form-control mb-2">
<option <?= ($row['gender']=="Male")?"selected":"" ?>>Male</option>
<option <?= ($row['gender']=="Female")?"selected":"" ?>>Female</option>
</select>

<input type="text" name="phone" value="<?= $row['phone'] ?>" class="form-control mb-2">

<button class="btn btn-success">Update</button>

</form>

</body>
</html>