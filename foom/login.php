<?php
session_start();
include("../config/conns.php");

$error = '';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $q = mysqli_query($conn,"SELECT * FROM student_users WHERE username='$username'");
    if(mysqli_num_rows($q) > 0){
        $user = mysqli_fetch_assoc($q);
        if(password_verify($password,$user['password'])){
            $_SESSION['student_id'] = $user['student_id'];
            $_SESSION['username'] = $user['username'];
            header("Location: student_dashboard.php");
            exit;
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "Username not found!";
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-5">
<div class="card shadow">
<div class="card-header text-center bg-primary text-white">
<h4>Student Login</h4>
</div>
<div class="card-body">
<?php if($error) echo "<div class='alert alert-danger'>$error</div>"; ?>
<form method="POST">
<div class="mb-3">
<input type="text" name="username" class="form-control" placeholder="Username " required>
</div>
<div class="mb-3">
<input type="password" name="password" class="form-control" placeholder="Password" required>
</div>
<button name="login" class="btn btn-success w-100">Login</button>
</form>
</div>
</div>
</div>
</div>
</div>