<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<form action="update_password.php" method="POST">

<input type="hidden" name="type" value="student">

<div class="mb-3">
<label>Old Password</label>
<input type="password" name="old" class="form-control" required>
</div>

<div class="mb-3">
<label>New Password</label>
<input type="password" name="new" class="form-control" required>
</div>

<button class="btn btn-success">
Update Password
</button>

</form>

</form>

</div>

</div>

</div>

</body>
</html>