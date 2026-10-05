<?php
include("../config/conns.php");
?>

<!DOCTYPE html>
<html>

<head>

<title>Users Table</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

<h3 class="mb-4">Users Management</h3>

<a href="register_user.php" class="btn btn-success mb-3">
<i class="fa fa-user-plus"></i> Add New User
</a>

<table class="table table-bordered table-striped text-center">

<tr>

<th>ID</th>
<th>Full Name</th>
<th>Email</th>
<th>Password</th>
<th>Address</th>
<th>Action</th>

</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM users");

while($row=mysqli_fetch_array($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['full_name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['password']; ?></td>

<td><?php echo $row['address']; ?></td>

<td>

<a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">
<i class="fa fa-pen"></i>
</a>

<a href="delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">
<i class="fa fa-trash"></i>
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>