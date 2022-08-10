<?php
session_start();

include_once ("dbconnect.php");

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $sql = "DELETE FROM tbl_prog WHERE id=$id";
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