<?php
include("config/conns.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM exams WHERE exam_id='$id'");
    if($delete){
        echo "<script>alert('Exam deleted successfully');window.location='exam_table.php';</script>";
    } else {
        echo "<script>alert('Error deleting exam');window.location='exam_table.php';</script>";
    }
} else {
    header("Location: exam_table.php");
}
?>