<?php

include("../config/conns.php");

$id=$_POST['id'];
$full_name=$_POST['full_name'];
$email=$_POST['email'];
$password=$_POST['password'];
$address=$_POST['address'];

mysqli_query($conn,"UPDATE users SET
full_name='$full_name',
email='$email',
password='$password',
address='$address'
WHERE id=$id");

header("location:users_table.php");

?>