<?php
session_start();
include("../config/conns.php");

$username=$_POST['username'];
$password=$_POST['password'];

$sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==1){

$_SESSION['admin']=$username;

header("location:dashboard.php");

}else{

echo "<script>
alert('Username ama Password waa khaldan');
window.location='login.php';
</script>";

}

?>