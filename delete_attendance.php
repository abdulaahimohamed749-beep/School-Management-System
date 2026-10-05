<?php
include("config/conns.php");

if(!isset($_GET['id'])){
    header("Location: attendance_table.php");
    exit();
}

$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM attendance WHERE id='$id'");
echo "<script>alert('Attendance deleted successfully'); window.location='attendance_table.php';</script>";