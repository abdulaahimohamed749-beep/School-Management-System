<?php
include("../config/conns.php");

$id=$_GET['id'];

$data=mysqli_query($conn,"SELECT * FROM users WHERE id=$id");

$row=mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>

<head>

<title>Edit User</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header text-center">

<h4>Edit User</h4>

</div>

<div class="card-body">

<form action="update_user.php" method="POST">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<input type="text" name="full_name" value="<?php echo $row['full_name']; ?>" class="form-control mb-3">

<input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control mb-3">

<input type="text" name="password" value="<?php echo $row['password']; ?>" class="form-control mb-3">

<input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control mb-3">

<button class="btn btn-primary w-100">Update</button>

<a href="users_table.php" class="btn btn-secondary w-100 mt-2">Cancel</a>

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>