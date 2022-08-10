<?php
session_start();

include_once ("dbconnect.php");

if(isset($_POST['deletedata'])){
    $id = $_POST['delete_id'];

    $sqlinsertappt = "INSERT INTO tbl_cancelled_appointment SELECT * FROM tbl_appointment WHERE id=$id";
    $stmtins = $conn->prepare($sqlinsertappt);
    $stmtins->execute();

    $sqldeleteappt = "DELETE FROM tbl_appointment WHERE id=$id";
    $stmtdel = $conn->prepare($sqldeleteappt);
    $stmtdel->execute();

    if(mysqli_query($conn, $sqldeleteappt)){
        echo '<script> alert("Appointment Cancelled"); </script>';
        header("Location: /Inasis-Management/myappointment.php");
    }
    else{
        echo '<script> alert("Appointment Not Cancelled"); </script>';
    }
    mysqli_close($conn);
}

?>