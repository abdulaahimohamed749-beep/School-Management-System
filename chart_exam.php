<?php
include("config/conns.php");

/* ===== TOP PER CLASS ===== */
$allClass = mysqli_query($conn,"
SELECT class, MAX(total) as total 
FROM exams GROUP BY class
");

$all_labels = [];
$all_totals = [];

while($row=mysqli_fetch_assoc($allClass)){
    $all_labels[] = "Class ".$row['class'];
    $all_totals[] = $row['total'];
}

/* ===== ALL STUDENTS ===== */
$students = mysqli_query($conn,"SELECT class, full_name, total FROM exams");

$data = [];
while($row=mysqli_fetch_assoc($students)){
    $data[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Exam Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

/* BACKGROUND */
body{
    background: linear-gradient(135deg,#1d2b64,#f8cdda);
    font-family: 'Segoe UI';
}

/* GLASS CARD */
.card{
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(15px);
    border-radius:20px;
    box-shadow:0 10px 40px rgba(0,0,0,0.3);
    color:white;
}

/* TITLE */
.title{
    text-align:center;
    font-weight:bold;
}

/* CLASS BUTTONS */
.class-btn{
    margin:5px;
    border-radius:20px;
    padding:8px 15px;
    border:none;
    background:linear-gradient(45deg,#00c6ff,#0072ff);
    color:white;
    transition:0.3s;
}

.class-btn:hover{
    transform:scale(1.1);
}

/* TOP 3 */
.top-box{
    border-radius:15px;
    padding:10px;
    margin:5px;
    text-align:center;
    background:rgba(255,255,255,0.2);
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="card p-4">

<h3 class="title mb-4">📊 Exam Analytics Pro</h3>

<!-- CLASS BUTTONS -->
<div class="text-center mb-3">

<button class="class-btn" onclick="loadAll()">All</button>

<?php for($i=1;$i<=12;$i++): ?>
<button class="class-btn" onclick="filterClass(<?= $i ?>)">Class <?= $i ?></button>
<?php endfor; ?>

</div>

<!-- TOP 3 -->
<div class="row mb-3" id="top3"></div>

<canvas id="chart"></canvas>

</div>

</div>

<script>

const ctx = document.getElementById('chart').getContext('2d');

const allLabels = <?php echo json_encode($all_labels); ?>;
const allTotals = <?php echo json_encode($all_totals); ?>;

const students = <?php echo json_encode($data); ?>;

let chart;

/* CREATE CHART */
function createChart(labels,data){

    if(chart) chart.destroy();

    const gradient = ctx.createLinearGradient(0,0,600,0);
    gradient.addColorStop(0,"#00f260");
    gradient.addColorStop(1,"#0575e6");

    chart = new Chart(ctx,{
        type:'bar',
        data:{
            labels:labels,
            datasets:[{
                data:data,
                backgroundColor:gradient,
                borderRadius:15
            }]
        },
        options:{
            plugins:{legend:{display:false}},
            animation:{duration:1200},
            indexAxis:'y'
        }
    });
}

/* TOP 3 FUNCTION */
function showTop3(list){

    let sorted = [...list].sort((a,b)=>b.total-a.total).slice(0,3);

    let html = "";

    sorted.forEach((s,i)=>{
        html += `
        <div class="col-md-4">
            <div class="top-box">
                <h5>${i+1} 🏆</h5>
                <p>${s.full_name}</p>
                <strong>${s.total}</strong>
            </div>
        </div>`;
    });

    document.getElementById("top3").innerHTML = html;
}

/* LOAD ALL */
function loadAll(){
    createChart(allLabels,allTotals);
    showTop3(students);
}

/* FILTER CLASS */
function filterClass(cls){

    let labels=[];
    let data=[];
    let list=[];

    students.forEach(s=>{
        if(s.class == cls){
            labels.push(s.full_name);
            data.push(s.total);
            list.push(s);
        }
    });

    createChart(labels,data);
    showTop3(list);
}

/* DEFAULT */
loadAll();

</script>

</body>
</html>