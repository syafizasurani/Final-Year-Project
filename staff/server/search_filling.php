<?php
session_start();

include_once ("dbconfig.php");

if(isset($_GET['button'])){
    $op = $_GET['button'];
    $search = $_GET['search'];

    if($op == 'search'){
        
    }

    if(mysqli_query($conn, $sqldeleteappt)){
        echo '<script> alert("Appointment Completed"); </script>';
        header("Location: /Inasis-Management/staff/appointment_list.php");
    }
    else{
        echo '<script> alert("Appointment Not Cancelled"); </script>';
    }
    mysqli_close($conn);
}

?>