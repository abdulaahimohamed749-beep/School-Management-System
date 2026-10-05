<?php

include("../config/conns.php");

$full_name=$_POST['full_name'];
$email=$_POST['email'];
$password=$_POST['password'];
$address=$_POST['address'];

mysqli_query($conn,"INSERT INTO users(full_name,email,password,address)
VALUES('$full_name','$email','$password','$address')");

header("location:users_table.php");

?>