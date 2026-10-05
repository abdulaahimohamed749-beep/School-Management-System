<!DOCTYPE html>
<html>

<head>

<title>Add Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-5">

<div class="card shadow">

<div class="card-header text-center">

<h4>Add New Admin</h4>

</div>

<div class="card-body">

<form action="save_admin.php" method="POST">

<input type="text" name="username" class="form-control mb-3" placeholder="Username" required>

<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

<button class="btn btn-success w-100">Save</button>

<a href="admin_table.php" class="btn btn-secondary w-100 mt-2">Cancel</a>

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>