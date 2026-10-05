
<?php
include("../config/conns.php");

$monthly_fee = 20;

$id = $_POST['id'];
$month = $_POST['month'];
$year = $_POST['year'];
$amount = $_POST['amount'];

/* hel student_id iyo balance hore */

$q = mysqli_query($conn,"SELECT student_id,balance FROM fee WHERE id='$id'");
$data = mysqli_fetch_assoc($q);

$student_id = $data['student_id'];
$previous_balance = $data['balance'] ?? 0;

/* xisaabi total lacagta lagu lahaa */

$total_due = $monthly_fee + $previous_balance;

/* xisaabi balance cusub */

$new_balance = $total_due - $amount;

if($new_balance < 0){
$new_balance = 0;
}

/* status */

$status = $new_balance > 0 ? "Balance" : "Paid";

/* update record */

mysqli_query($conn,"
UPDATE fee 
SET month='$month',
year='$year',
amount='$amount',
balance='$new_balance',
status='$status'
WHERE id='$id'
");

/* message */

if($new_balance == 0){
$msg = "Update complete. Balance is now 0.";
}else{
$msg = "Fee updated. Remaining balance: $new_balance";
}

echo "
<script>
alert('$msg');
window.location='add_fee.php';
</script>
";
?>

