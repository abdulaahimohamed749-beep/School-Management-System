<?php

include("../config/conns.php");

$id=$_GET['id'];

$count=mysqli_query($conn,"SELECT * FROM admin");

if(mysqli_num_rows($count)==1){

echo "<script>
alert('Hal admin lama delete karo');
window.location='admin_table.php';
</script>";

exit();

}

mysqli_query($conn,"DELETE FROM admin WHERE id=$id");

echo "<script>
alert('Admin waa la delete gareeyay');
window.location='admin_table.php';
</script>";

?>