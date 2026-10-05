<?php

include("../config/conns.php");

$username=$_POST['username'];
$password=$_POST['password'];

if(strlen($password)<6){

echo "<script>
alert('Password waa daciif');
history.back();
</script>";

exit();

}

$count=mysqli_query($conn,"SELECT * FROM admin");

if(mysqli_num_rows($count)>=2){

echo "<script>
alert('System wuxuu ogolyahay 2 Admin kaliya');
history.back();
</script>";

exit();

}

mysqli_query($conn,"INSERT INTO admin(username,password) VALUES('$username','$password')");

header("location:admin_table.php");

?>