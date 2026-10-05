<!DOCTYPE html>
<html>

<head>

<title>Admin Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-4">

<div class="card shadow">

<div class="card-header text-center">

<h4>Admin Login</h4>

</div>

<!-- <div class="card-body<div class="card-body  background-color: #0c406e; color: #efefef;>"> -->
<style>

/* PAGE BACKGROUND */
body{
    background: linear-gradient(135deg, #0c406e, #145da0);
}

/* CARD GUUD */
.card{
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    border: none;
}

/* HEADER */
.card-header{
    background-color: #0c406e;
    color: white;
    font-weight: bold;
    font-size: 20px;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}

/* CARD BODY */
.card-body{
    background-color: #095188;
}

/* INPUTS (USERNAME & PASSWORD) */
.form-control{
    border-radius: 8px;
    border: 1px solid #a1900f;
    padding: 10px;
}

/* PLACEHOLDER */
.form-control::placeholder{
    color: #0610c8;
}

/* MARKA LA CLICK GAREEYO */
.form-control:focus{
    border-color: #0c406e;
    box-shadow: 0 0 5px rgba(12,64,110,0.5);
    
}

</style>

<form action="login_process.php" method="POST">
    
<br>

<input type="text" name="username" class="form-control mb-3" placeholder="Username" required>

<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

<button class="btn btn-primary w-100 mb-2">
<i class="fa fa-sign-in"></i> Login
</button>

<button type="reset" class="btn btn-secondary w-100 mb-2">
Cancel
</button>

<a href="register_admin.php" class="btn btn-success w-100 mb-3">
Register Admin
</a>

<button class="btn btn-danger w-100">
<i class="fa-brands fa-google"></i> Login with Google
</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>