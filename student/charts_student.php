<?php
include("../config/conns.php");
session_start();
if(!isset($_SESSION['admin'])){
    echo "<script>window.top.location='../admin/login.php';</script>";
    exit();
}
$chart_data = [];
for($i=1;$i<=12;$i++){
    $res = mysqli_query($conn,"SELECT COUNT(*) as total FROM students WHERE class='$i'");
    $row = mysqli_fetch_assoc($res);
    $chart_data[$i] = $row['total'];
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Students Chart</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div style="width:80%;margin:50px auto;">
<canvas id="studentChart"></canvas>
</div>

<script>
const ctx = document.getElementById('studentChart').getContext('2d');
const studentChart = new Chart(ctx,{
    type:'bar',
    data:{
        labels: [<?php for($i=1;$i<=12;$i++){ echo "'Class $i',"; } ?>],
        datasets:[{
            label:'Number of Students',
            data:[<?php foreach($chart_data as $c) echo $c.','; ?>],
            backgroundColor:'rgba(54, 162, 235, 0.7)',
            borderColor:'rgba(54, 162, 235, 1)',
            borderWidth:1
        }]
    },
    options:{ scales:{ y:{ beginAtZero:true } } }
});
</script>
</body>
</html>