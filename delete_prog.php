<?php

  
$con = mysqli_connect('localhost', 'root');
$db = mysqli_select_db($con, 'inasis_management');

//delete programme
if(isset($_POST['delete'])){
    $id = $POST['id'];

    $sql = "DELETE FROM tbl_prog WHERE id=$id"; 
    $sql_run = mysqli_query($con, $sql);

    if($query_run){
        echo '<script> alert("Programme Deleted"); </script>';
        header("location: /Inasis-Management/clubpage.php");
    }
    else{
        echo '<script> alert("Programme Not Deleted"); </script>';
    }

    // $_SESSION['message'] = "University has been deleted";
    // $_SESSION['msg_type'] = "danger";

    // header('location: manage_uni.php');
}

?>