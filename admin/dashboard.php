<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Abdullaahi School</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
body{
    margin:0;
    font-family: 'Arial', sans-serif;
    background-color: #270c93; /* Background cad oo nadiif ah */
}

/* SIDEBAR */
.sidebar{
    position:fixed;
    width:260px;
    height:100%;
    background:# #c6ccda; /* Midabka sidebar */
    overflow-y:auto;
    padding-top:20px;
    box-shadow: 2px 0 8px rgba(0,0,0,0.1);
}

.sidebar .logo{
    text-align:center;
    color:#ffffff;
    font-size:22px;
    padding:20px 0;
    font-weight:bold;
    border-bottom:1px #34495e;
}

.sidebar a{
    display:block;
    color:white;
    padding:12px 25px;
    text-decoration:none;
    border-radius:6px;
    margin:5px 10px;
    transition:0.3s;
}

.sidebar a i{
    margin-right:10px;
}

.sidebar a:hover{
    background:#27ae60;
    color:white;
    padding-left:30px;
}

/* TOPBAR */
.topbar{
    margin-left:260px;
    background: #e1eef3; /* cad */
    color:#333;
    padding:15px 25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    border-bottom:1px solid #d8dfe5;
    box-shadow:0 2px 5px rgba(0,0,0,0.1);
    position: sticky;
    top:0;
    z-index: 10;
}

/* CONTENT */
.content{
    margin-left:260px;
    padding:20px;
    min-height: calc(100vh - 70px);
    background-color: #013364 /* Cad oo khafiif ah */
}

/* IFRAME */
iframe{
    width:100%;
    height:650px;
    border:none;
    border-radius:6px;
    background: #d0d5da;
    box-shadow:0 4px 8px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

/* SCROLLBAR SIDEBAR */
.sidebar::-webkit-scrollbar {
    width:6px;
}

.sidebar::-webkit-scrollbar-thumb {
    background-color:#27ae60;
    border-radius:3px;
}

.sidebar::-webkit-scrollbar-track {
    background:#f1f1f1;
}
</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

<div class="logo">Abdullaahi School</div>

<!-- DASHBOARD -->
<!-- <a href="#" onclick="loadPage('home.php')">
<i class="fa fa-home"></i> Home
</a> -->


<!-- REGISTER STUDENT -->
<a href="#" onclick="loadPage('/abdullahi_school/student/student_register.php'); return false;">
<i class="fa fa-user-plus"></i> Register Student
</a>

<!-- STUDENT TABLE -->
<a href="#" onclick="loadPage('/abdullahi_school/student/student_table.php'); return false;">
<i class="fa fa-user-graduate"></i> Student Table
</a>

<!-- STUDENT REPORT -->
<a href="#" onclick="loadPage('/abdullahi_school/student/report_student.php'); return false;">
<i class="fa fa-file"></i> Student Report
</a>

<!-- STUDENT CHART -->
<a href="#" onclick="loadPage('/abdullahi_school/student/charts_student.php'); return false;">
<i class="fa fa-chart-bar"></i> Student Chart
</a>

<!-- USERS -->
<a href="#" onclick="loadPage('../users/register_user.php')">
<i class="fa fa-user-plus"></i> Add User
</a>

<a href="#" onclick="loadPage('../users/users_table.php')">
<i class="fa fa-users"></i> Users Table
</a>

<!-- FEE -->
<a href="#" onclick="loadPage('../fee/add_fee.php')">
<i class="fa fa-plus"></i> Add Fee
</a>

<a href="#" onclick="loadPage('../fee/fee_table.php')">
<i class="fa fa-money-bill"></i> Fee Table
</a>

<!-- EXAMS -->
<a href="#" onclick="loadPage('../exam_register.php')">
<i class="fa fa-pen"></i> Register Exam
</a>

<a href="#" onclick="loadPage('../exam_table.php')">
<i class="fa fa-file"></i> Exam Table
</a>

<a href="#" onclick="loadPage('../exam_report.php')">
<i class="fa fa-chart-bar"></i> Exam Report
</a>

<a href="#" onclick="loadPage('../chart_exam.php')">
<i class="fa fa-chart-pie"></i> Exam Chart
</a>

<!-- ATTENDANCE -->
<a href="#" onclick="loadPage('../add_new_attendance.php')">
<i class="fa fa-calendar-plus"></i> Add Attendance
</a>

<a href="#" onclick="loadPage('../attendance_table.php')">
<i class="fa fa-calendar"></i> Attendance Table
</a>

<a href="#" onclick="loadPage('../report_attendance.php')">
<i class="fa fa-file"></i> Attendance Report
</a>

<a href="#" onclick="loadPage('../chart_attendance.php')">
<i class="fa fa-chart-bar"></i> Attendance Chart
</a>

<!-- RESULT -->
<a href="#" onclick="loadPage('../result/result.php')">
<i class="fa fa-chart-line"></i> Result
</a>
<a href="#" onclick="loadPage('../result/add_new.php')">
    <i class="fa fa-plus-circle"></i> Add New 
</a>

<!-- PASSWORD -->
<a href="#" onclick="loadPage('../result/change_password.php')">
<i class="fa fa-lock"></i> Change Password
</a>

<!-- ADMIN -->
<a href="#" onclick="loadPage('../admin/register_admin.php')">
<i class="fa fa-user-shield"></i> Register Admin
</a>

<a href="#" onclick="loadPage('../admin/admin_table.php')">
<i class="fa fa-user-cog"></i> Admin Table
</a>

<!-- LOGOUT -->
<a href="logout.php">
<i class="fa fa-sign-out-alt"></i> Logout
</a>

</div>

<!-- TOPBAR -->
<div class="topbar">

<h4>Dashboard</h4>

<div>
<img src="../images/admin.png" width="40" class="me-2 rounded-circle">
<img src="../images/school.png" width="40" class="me-2 rounded-circle">
</div>

</div>

<!-- CONTENT -->
<div class="content">

<iframe id="mainPage" src="home.php"></iframe>

</div>


<script>
function loadPage(page){
    const iframe = document.getElementById("mainPage");
    iframe.style.opacity = 0;
    setTimeout(() => {
        iframe.src = page;
        iframe.onload = () => {
            iframe.style.opacity = 1;
        }
    }, 150);
}
</script>

</body>
</html>