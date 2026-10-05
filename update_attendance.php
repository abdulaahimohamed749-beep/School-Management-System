<?php
include("config/conns.php");

if(isset($_POST['id']) && isset($_POST['status'])){
    $id = $_POST['id'];
    $status = $_POST['status'];

    mysqli_query($conn,"UPDATE attendance SET status='$status' WHERE id='$id'");
    echo "<script>alert('Attendance updated successfully'); window.location='attendance_table.php';</script>";
} else {
    header("Location: attendance_table.php");
}