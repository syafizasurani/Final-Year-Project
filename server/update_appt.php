<?php

session_start();

$con = mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'hep_student');

//update appointment
if(isset($_POST['update'])){

    $id = $_POST['id'];
    $service = $_POST['service'];
    $appt_date = $_POST['appt_date'];
    $slot = $_POST['slot'];
    $stud_name = $_POST['stud_name'];
    $matric_no = $_POST['matric_no'];
    $semester = $_POST['semester'];
    $phone_no = $_POST['phone_no'];

    $q = "UPDATE `tbl_appointment` SET `service`='$service', `appt_date`='$appt_date', `slot`='$slot', `stud_name`='$stud_name', `semester`='$semester', 
        `matric_no`='$matric_no', `phone_no`='$phone_no' WHERE id=$id";

    $query = mysqli_query($con, $q);

    if($query){
        $_SESSION['status'] = "Your appointment has successfully updated!
                                Please print out your appointment slip at your appointment list when you come to the counter later.";
        header("Location: /Inasis-Management/update_appointment.php");
    }
    else{
        echo "Ops, Something went wrong";
    } 
}

?> 