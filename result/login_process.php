<?php
session_start();
include("../config/conns.php");

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $student_id = $_POST['student_id'];

    // Hubi login-ka ardayga
    $sql = "SELECT * FROM student_login WHERE username='$username' AND password='$password' AND student_id='$student_id'";
    $query = mysqli_query($conn, $sql);

    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $_SESSION['student_id'] = $row['student_id'];
        $_SESSION['username'] = $row['username'];
        header("Location: result.php");
        exit();
    } else {
        echo "<script>alert('Invalid credentials'); window.location='login.php';</script>";
    }

} else {
    header("Location: login.php");
    exit();
}
?>