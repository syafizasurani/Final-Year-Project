<?php

session_start();

$con1 = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con1, 'hep_staff');

//book appointment
if(isset($_POST['booksubmit'])){

    $service = $_POST['service'];
    $appt_date = $_POST['appt_date'];
    $slot = $_POST['slot'];
    $stud_name = $_POST['stud_name'];
    $matric_no = $_POST['matric_no'];
    $semester = $_POST['semester'];
    $phone_no = $_POST['phone_no'];

    $q1 = "INSERT INTO `scaling_appointment`(`service`, `appt_date`, `slot`, `stud_name`, `matric_no`, `semester`, `phone_no`) 
        VALUES ('$service','$appt_date','$slot','$stud_name','$matric_no','$semester', '$phone_no')";
    $query1 = mysqli_query($con1, $q1);

    if($query1){
        $_SESSION['status'] = "Appointment Successfully Booked!";
        header("Location: /Inasis-Management/staff/new_scaling.php");
    }
    else{
        echo "Ops, Something went wrong";
    } 
}

?> 