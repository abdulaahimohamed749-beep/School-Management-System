<?php

include("../config/conns.php");

$id=$_POST['id'];
$username=$_POST['username'];
$password=$_POST['password'];

mysqli_query($conn,"UPDATE admin SET username='$username',password='$password' WHERE id=$id");

header("location:admin_table.php");

?>