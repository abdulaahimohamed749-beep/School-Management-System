<?php
include("../config/conns.php");

$student_id = $_POST['student_id'];
$username = $_POST['username'];
$password = $_POST['password'];

mysqli_query($conn,"
INSERT INTO student_login(student_id,username,password)
VALUES('$student_id','$username','$password')
");

echo "

<script>

alert('Student Login Added');

window.location='add_new.php';

</script>

";
?>