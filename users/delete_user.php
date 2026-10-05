<?php

include("../config/conns.php");

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM users WHERE id=$id");

echo "<script>
alert('User waa la delete gareeyay');
window.location='users_table.php';
</script>";

?>