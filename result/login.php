<!DOCTYPE html>
<html>
<head>
<title>Student Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white text-center">

<h3>Welcome Student</h3>

</div>

<div class="card-body">

<form method="POST" action="login_process.php">

<div class="mb-3">

<label>Username</label>

<input type="text" name="username" class="form-control" required>

</div>

<div class="mb-3">

<label>Password</label>

<input type="password" name="password" class="form-control" required>

</div>

<div class="mb-3">

<label>Student ID</label>

<input type="number" name="student_id" class="form-control" required>

</div>

<button class="btn btn-success w-100">

<i class="bi bi-box-arrow-in-right"></i> Login

</button>

</form>

</div>

</div>

</div>

</body>
</html>