<?php
session_start();

// include_once ("dbconnect.php");
$con1 = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con1, 'pku_staff');

if(isset($_GET['complete'])){
    $id = $_GET['complete'];

    $sqlinsertcompletedappointment = "INSERT INTO removing_history SELECT `id`, `matric_no`, `service`, `appt_date`, `slot`, `stud_name`, `semester`, `phone_no` 
                                    FROM filling_appointment WHERE id='$id'";
    $sqldeletecart = "DELETE FROM tbl_cart WHERE user_email='$userid'";
    // $sql = "DELETE FROM tbl_prog WHERE id=$id";
    if(mysqli_query($conn, $sql)){
        $_SESSION['status'] = "Programme Deleted.";
        header("Location: /Inasis-Management/clubpage.php");
    }
    else{
        echo "Error deleting programme" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>