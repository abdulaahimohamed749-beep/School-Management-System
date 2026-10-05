<?php
session_start();
include("../config/conns.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $type = $_POST['type'] ?? '';
    $new  = $_POST['new'] ?? '';

    // =========================
    // STUDENT CHANGE PASSWORD
    // =========================
    if($type == "student"){

        if(!isset($_SESSION['student_id'])){
            echo "<script>
            alert('Session expired, fadlan login mar kale');
            window.location='login.php';
            </script>";
            exit();
        }

        $id  = $_SESSION['student_id'];
        $old = $_POST['old'] ?? '';

        // hubi user jiro
        $check = mysqli_query($conn,"
        SELECT * FROM student_login 
        WHERE student_id='$id'
        ");

        if(mysqli_num_rows($check) > 0){

            $row = mysqli_fetch_assoc($check);

            // hubi old password sax yahay
            if($row['password'] == $old){

                // update password
                $update = mysqli_query($conn,"
                UPDATE student_login 
                SET password='$new'
                WHERE student_id='$id'
                ");

                if($update){
                    echo "<script>
                    alert('Password si guul ah ayaa loo badalay');
                    window.location='result.php';
                    </script>";
                } else {
                    echo "<script>
                    alert('Error updating password');
                    window.location='setting_password.php';
                    </script>";
                }

            } else {

                echo "<script>
                alert('Old password waa qalad');
                window.location='setting_password.php';
                </script>";
            }

        } else {

            echo "<script>
            alert('Student lama helin');
            window.location='login.php';
            </script>";
        }

    }

    // =========================
    // ADMIN RESET PASSWORD
    // =========================
    elseif($type == "admin"){

        $student_id = $_POST['student_id'] ?? '';

        if($student_id == ''){
            echo "<script>
            alert('Student ID missing');
            window.location='setting_password.php';
            </script>";
            exit();
        }

        $update = mysqli_query($conn,"
        UPDATE student_login 
        SET password='$new'
        WHERE student_id='$student_id'
        ");

        if($update){
            echo "<script>
            alert('Password si guul ah ayaa loo reset gareeyay');
            window.location='setting_password.php';
            </script>";
        } else {
            echo "<script>
            alert('Error resetting password');
            window.location='setting_password.php';
            </script>";
        }

    }

    else {
        echo "<script>
        alert('Invalid request');
        window.location='login.php';
        </script>";
    }

} else {
    header("Location: login.php");
    exit();
}
?>