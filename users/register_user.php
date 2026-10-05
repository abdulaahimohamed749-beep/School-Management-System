<?php
include("../config/conns.php");
session_start();

// Hubinta haddii Admin la verify gareeyay
$admin_verified = false;
$admin_data = [];

if(isset($_POST['verify_admin'])){
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$admin_username' AND password='$admin_password'");
    
    if(mysqli_num_rows($query) == 1){
        $admin_verified = true;
        $admin_data = mysqli_fetch_array($query);
        $_SESSION['admin_verified'] = true;
    } else {
        echo "<script>alert('Admin Username ama Password waa khaldan');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Register User</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">
<div class="row justify-content-center mt-5">
<div class="col-md-6">

<!-- ADMIN FORM -->
<div class="card shadow mb-4">
<div class="card-header text-center bg-dark text-white">
<h5>Admin Verification</h5>
</div>
<div class="card-body">

<?php if($admin_verified): ?>
    <!-- Haddii Admin la verify gareeyay, xogtiisa soo bandhig -->
    <div class="alert alert-success text-center">
        Admin Verified: <strong><?php echo $admin_data['username']; ?></strong>
    </div>
<?php else: ?>
    <form method="POST">
        <input type="text" name="admin_username" class="form-control mb-3" placeholder="Admin Username" required>
        <input type="password" name="admin_password" class="form-control mb-3" placeholder="Admin Password" required>
        <button type="submit" name="verify_admin" class="btn btn-primary w-100">Verify Admin</button>
    </form>
<?php endif; ?>

</div>
</div>

<!-- USER REGISTER FORM -->
<?php if($admin_verified): ?>
<div class="card shadow">
<div class="card-header text-center">
<h4>Register New User</h4>
</div>
<div class="card-body">
<form action="save_user.php" method="POST">
<input type="text" name="full_name" class="form-control mb-3" placeholder="Full Name" required>
<input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
<input type="text" name="address" class="form-control mb-3" placeholder="Address" required>
<button class="btn btn-success w-100">Save User</button>
<a href="users_table.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
</form>
</div>
</div>
<?php else: ?>
    <div class="alert alert-warning text-center">
        Fadlan marka hore verify garey Admin ka hor intaadan user register gelin.
    </div>
<?php endif; ?>

</div>
</div>
</div>

</body>
</html>