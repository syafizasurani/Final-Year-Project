<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php
session_start();

include_once ("dbconfig.php");

if(isset($_POST['removedata'])){
    $id = $_POST['remove_id'];

    $sqlinsertappt = "INSERT INTO removing_history SELECT * FROM removing_appointment WHERE id=$id";
    $stmtins = $conn->prepare($sqlinsertappt);
    $stmtins->execute();

    $sqldeleteappt = "DELETE FROM removing_appointment WHERE id=$id";
    $stmtdel = $conn->prepare($sqldeleteappt);
    $stmtdel->execute();

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