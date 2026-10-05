<?php
include("config/conns.php");

// Classes 1 ilaa 12
$all_classes = range(1,12);

// Fetch attendance data grouped by class
$q = mysqli_query($conn,"
    SELECT s.class,
           SUM(a.status='P') AS present,
           SUM(a.status='A') AS absent,
           COUNT(a.id) AS total
    FROM students s
    LEFT JOIN attendance a ON a.student_id=s.id
    GROUP BY s.class
    ORDER BY s.class ASC
");

$attendance_data = [];
while($row = mysqli_fetch_assoc($q)){
    $attendance_data[$row['class']] = [
        'present' => $row['present'] ?? 0,
        'absent' => $row['absent'] ?? 0,
        'total' => $row['total'] ?? 0
    ];
}

// Buuxi classes-ka aan attendence lahayn
$classes = [];
$present_percent = [];
$absent_percent = [];
$present_count = [];
$absent_count = [];

foreach($all_classes as $class){
    $classes[] = "Class ".$class;
    if(isset($attendance_data[$class]) && $attendance_data[$class]['total']>0){
        $present_count[] = $attendance_data[$class]['present'];
        $absent_count[] = $attendance_data[$class]['absent'];
        $present_percent[] = round(($attendance_data[$class]['present']/$attendance_data[$class]['total'])*100,2);
        $absent_percent[] = round(($attendance_data[$class]['absent']/$attendance_data[$class]['total'])*100,2);
    } else {
        $present_count[] = 0;
        $absent_count[] = 0;
        $present_percent[] = 0;
        $absent_percent[] = 0;
    }
}

$max_absent = max($absent_percent);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header text-center bg-primary text-white">
            <h4>Attendance Chart by Class</h4>
        </div>
        <div class="card-body">
            <canvas id="attendanceChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('attendanceChart').getContext('2d');

new Chart(ctx,{
    type:'bar',
    data:{
        labels: <?php echo json_encode($classes); ?>,
        datasets:[
            {
                label:'Present (%)',
                data: <?php echo json_encode($present_percent); ?>,
                backgroundColor:'rgba(54,162,235,0.7)',
                borderColor:'rgba(54,162,235,1)',
                borderWidth:1,
                hoverBackgroundColor:'rgba(54,162,235,1)',
                hoverBorderColor:'rgba(0,0,255,1)'
            },
            {
                label:'Absent (%)',
                data: <?php echo json_encode($absent_percent); ?>,
                backgroundColor: <?php echo json_encode(array_map(function($a) use($max_absent){return $a==$max_absent?'rgba(255,0,0,0.9)':'rgba(255,99,132,0.7)';}, $absent_percent)); ?>,
                borderColor:'rgba(255,99,132,1)',
                borderWidth:1,
                hoverBackgroundColor:'rgba(255,0,0,1)',
                hoverBorderColor:'rgba(255,0,0,1)'
            }
        ]
    },
    options:{
        responsive:true,
        interaction:{
            mode:'index',
            intersect:false
        },
        plugins:{
            tooltip:{
                enabled:true,
                callbacks:{
                    label: function(context){
                        let index = context.dataIndex;
                        let dataset = context.dataset.label;
                        if(dataset=='Present (%)'){
                            return dataset + ': ' + <?php echo json_encode($present_count); ?>[index] + ' students (' + context.raw + '%)';
                        } else {
                            return dataset + ': ' + <?php echo json_encode($absent_count); ?>[index] + ' students (' + context.raw + '%)';
                        }
                    }
                }
            },
            legend:{
                position:'top',
                labels:{font:{size:14}}
            }
        },
        scales:{
            y:{ 
                beginAtZero:true, 
                max:100,
                title:{display:true,text:'Percentage (%)', font:{size:14}}
            },
            x:{ 
                title:{display:true,text:'Class', font:{size:14}} 
            }
        },
        animation:{
            duration:1800,
            easing:'easeOutBounce'
        }
    }
});
</script>