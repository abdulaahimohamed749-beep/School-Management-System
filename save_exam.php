<?php
include("config/conns.php");

if(isset($_POST['student_id'])){
    $student_id = $_POST['student_id'];
    $tarbiyo = $_POST['tarbiyo'];
    $carabi = $_POST['carabi'];
    $english = $_POST['english'];
    $physics = $_POST['physics'];
    $maths = $_POST['maths'];
    $chemistry = $_POST['chemistry'];
    $biology = $_POST['biology'];
    $ict = $_POST['ict'];

    $student_query = mysqli_query($conn, "SELECT full_name, class FROM students WHERE id='$student_id'");
    $student_data = mysqli_fetch_assoc($student_query);

    $insert = mysqli_query($conn, "INSERT INTO exams (student_id, full_name, class, tarbiyo, carabi, english, physics, maths, chemistry, biology, ict)
        VALUES ('$student_id', '{$student_data['full_name']}', '{$student_data['class']}', '$tarbiyo','$carabi','$english','$physics','$maths','$chemistry','$biology','$ict')");

    if($insert){
        echo "<script>alert('Exam marks saved successfully');window.location='exam_register.php';</script>";
    } else {
        echo "<script>alert('Error saving exam');window.location='exam_register.php';</script>";
    }
}
?>