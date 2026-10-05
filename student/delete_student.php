<?php
include("../config/conns.php");
session_start();
if(!isset($_SESSION['admin'])){
    echo "<script>window.top.location='../admin/login.php';</script>";
    exit();
}
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM students WHERE id='$id'");
header("Location: student_table.php");
?>