<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'hep_student') or die(mysqli_error($mysqli));

$prog_name = '';
$update = false;
$prog_desc = '';
$prog_date = '';
$prog_venue = '';
$prog_link = '';
$prog_poster = '';

if(isset($_GET['view'])){
    $id = $_GET['view'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM tbl_prog WHERE prog_name=$prog_name") 
    or die($mysqli->error);
    if(count(array($result)) == 1){
        $row = $result->fetch_array();
        $prog_name = $row['prog_name'];
        $prog_desc = $row['prog_desc'];
        $prog_date = $row['prog_date'];
        $prog_venue = $row['prog_venue'];
        $prog_link = $row['prog_link'];
        $prog_poster = $row['prog_poster'];
    }
}

?>