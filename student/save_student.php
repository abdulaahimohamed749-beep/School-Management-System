<?php
include("../config/conns.php");
session_start();
if(!isset($_SESSION['admin'])){
    echo "<script>window.top.location='../admin/login.php';</script>";
    exit();
}

if($_SERVER['REQUEST_METHOD']=="POST"){
    $full_name = mysqli_real_escape_string($conn,$_POST['full_name']);
    $class = mysqli_real_escape_string($conn,$_POST['class']);
    $parent_name = mysqli_real_escape_string($conn,$_POST['parent_name']);
    $fee = mysqli_real_escape_string($conn,$_POST['fee']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);

    $sql = "INSERT INTO students (full_name,class,parent_name,fee,gender,phone) 
            VALUES ('$full_name','$class','$parent_name','$fee','$gender','$phone')";
    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Student saved successfully'); window.location='student_register.php';</script>";
    } else {
        echo "Error: ".mysqli_error($conn);
    }
}
?>