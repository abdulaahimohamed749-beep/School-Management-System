<?php

include("../config/conns.php");

$id=$_GET['id'];

$data=mysqli_query($conn,"SELECT * FROM admin WHERE id=$id");

$row=mysqli_fetch_array($data);

?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-5">

<div class="card shadow">

<div class="card-header text-center">
<h4>Edit Admin</h4>
</div>

<div class="card-body">

<form action="update_admin.php" method="POST">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<label>Username</label>
<input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control mb-3">

<label>Password</label>
<input type="text" name="password" value="<?php echo $row['password']; ?>" class="form-control mb-3">

<button class="btn btn-primary w-100">Update</button>

<a href="admin_table.php" class="btn btn-secondary w-100 mt-2">Cancel</a>

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>