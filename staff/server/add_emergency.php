<?php

session_start();

$con1 = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con1, 'hep_staff');

//book appointment
if(isset($_POST['submit_case'])){

    $service = $_POST['service'];
    $case_date = $_POST['case_date'];
    $case_time = $_POST['case_time'];
    $stud_name = $_POST['stud_name'];
    $matric_no = $_POST['matric_no'];
    $semester = $_POST['semester'];
    $phone_no = $_POST['phone_no'];
    $case_details = $_POST['case_details'];

    $q1 = "INSERT INTO `emergency_case`(`service`, `case_date`, `case_time`, `stud_name`, `matric_no`, `semester`, `phone_no`, `case_details`) 
        VALUES ('$service','$case_date','$case_time','$stud_name','$matric_no','$semester', '$phone_no',  '$case_details')";
    $query1 = mysqli_query($con1, $q1);

    if($query1){
        $_SESSION['add_status'] = "Appointment Successfully Booked!";
        header("Location: /Inasis-Management/staff/new_emergency.php");
    }
    else{
        echo "Ops, Something went wrong";
    } 
}

?> 