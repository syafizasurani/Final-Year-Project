<?php
error_reporting(0);
include_once("dbconnect.php");
$club_name = $_POST['club_name'];
$matric_no = $_POST['matric_no'];

$sqllogin = "SELECT * FROM tbl_student WHERE club_name = '$club_name' AND matric_no = '$matric_no'";
$result = $conn->query($sqllogin);

if ($result->num_rows > 0) {
    while ($row = $result ->fetch_assoc()){
        header("Location: /Inasis-Management/new_programme.php");
    }
}
else{
    echo "<script language='javascript'>";
    echo "alert('WRONG INFORMATION')";
    echo "</script>";
    die();
}

?>