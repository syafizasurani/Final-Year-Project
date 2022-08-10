<?php
error_reporting(0);
include_once("dbconnect.php");

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$sqllogin = "SELECT * FROM tbl_student WHERE username = '$username' AND password = '$password'";

if($role == "student"){
    $result = $conn->query($sqllogin);

    if ($result->num_rows > 0) {
        while ($row = $result ->fetch_assoc()){
            header("Location: /Inasis-Management/menupage.php");
        }
    }
    else{
        echo "<script language='javascript'>";
        echo "alert('WRONG INFORMATION')";
        echo "</script>";
        die();
    }
}
else{
    $result = $conn->query($sqllogin);

    if ($result->num_rows > 0) {
        while ($row = $result ->fetch_assoc()){
            header("Location: /Inasis-Management/staff/pku_dashboard.php");
        }
    }
    else{
        echo "<script language='javascript'>";
        echo "alert('WRONG INFORMATION')";
        echo "</script>";
        die();
    }
}

// include_once("dbconnect.php");
// $username = $_POST['username'];
// $password = $_POST['password'];

// $sqllogin = "SELECT * FROM tbl_student WHERE username = '$username' AND password = '$password'";
// $result = $conn->query($sqllogin);

// if ($result->num_rows > 0) {
//     while ($row = $result ->fetch_assoc()){
//         header("Location: /Inasis-Management/menupage.php");
//     }
// }
// else{
//     echo "<script language='javascript'>";
//     echo "alert('WRONG INFORMATION')";
//     echo "</script>";
//     // echo "Location: /Inasis-Management/login.php";
//     die();
// }

?>