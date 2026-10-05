```php
<?php
include("../config/conns.php");

$id = $_GET['id'];

$query = mysqli_query($conn,"
SELECT f.*, s.full_name, s.class
FROM fee f
JOIN students s ON f.student_id = s.id
WHERE f.id='$id'
");

$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>

<title>Delete Fee</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-danger text-white">
<h4>Delete Fee Record</h4>
</div>

<div class="card-body text-center">

<div class="alert alert-warning">

<h5>
⚠️ Fadlan iska hubi!  
Ma hubtaa inaad tirtirayso xogtaan?
</h5>

<p>
Student: <b><?php echo $row['full_name']; ?></b><br>
Class: <b><?php echo $row['class']; ?></b><br>
Month: <b><?php echo $row['month']; ?></b><br>
Amount: <b>$<?php echo $row['amount']; ?></b>
</p>

</div>

<form method="POST">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<button name="confirm_delete" class="btn btn-danger">
Yes Delete
</button>

<a href="fee_table.php" class="btn btn-secondary">
Cancel
</a>

</form>

</div>

</div>

</div>

</body>
</html>

<?php

if(isset($_POST['confirm_delete'])){

$id = $_POST['id'];

mysqli_query($conn,"DELETE FROM fee WHERE id='$id'");

echo "

<script>

alert('Fee record deleted successfully');

window.location='fee_table.php';

</script>

";

}

?>
```
