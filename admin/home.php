<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style>
        body{
            font-family: Arial;
            padding:20px;
        }
    </style>
</head>

<body>



</body>
</html> 