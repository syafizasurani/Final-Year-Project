<?php
session_start();

$con = mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'hep_student');

//add new programme
if(isset($_POST['submitupload'])){
    $prog_name = $_POST['prog_name'];
    $prog_desc = $_POST['prog_desc'];
    $prog_date = $_POST['prog_date'];
    $prog_venue = $_POST['prog_venue'];
    $prog_link = $_POST['prog_link'];
    $files = $_FILES['file'];

    print_r($prog_name);
    echo "<br>";

    $filename = $files['name'];
    $fileerror = $files['error'];
    $filetmp = $files['tmp_name'];

    $fileext = explode('.', $filename);
    $filecheck = strtolower(end($fileext));

    $fileextstored = array('png', 'jpg', 'jpeg');

    if(in_array($filecheck, $fileextstored)){
        $destinationfile = 'upload_prog/'.$filename;
        move_uploaded_file($filetmp, $destinationfile);

        $q = "INSERT INTO `tbl_prog`(`prog_name`, `prog_desc`, `prog_date`, `prog_venue`, `prog_link`, `prog_poster`) 
        VALUES ('$prog_name','$prog_desc','$prog_date ','$prog_venue','$prog_link','$destinationfile')";

        $query = mysqli_query($con, $q);

        if($query){
            $_SESSION['status'] = "New Programme Successfully Added!";
            header("Location: /Inasis-Management/new_programme.php");
        }
        else{
            echo "Ops, Something went wrong";
        } 
    }
}

// $conn = mysqli_connect("localhost", "root", "", "inasis_management");

// if(isset($_POST['submitupload'])){
//     $prog_name = $_POST['prog_name'];
//     $prog_desc = $_POST['prog_desc'];
//     $prog_date = $_POST['prog_date'];
//     $prog_venue = $_POST['prog_venue'];
//     $prog_link = $_POST['prog_link'];
    // $files = $_FILES['file'];
//     if($_FILES["file"]["error"] === 4){
//         echo "<script> alert('Image Does Not Exist'); </script>";
//     }
//     else{
//         $fileName = $_FILES["file"]["name"];
//         $fileSize = $_FILES["file"]["name"];
//         $tmpName = $_FILES["file"]["tmp_name"];

//         $validImageExtension = ['jpg', 'png', 'jpeg'];
//         $imageExtension = explode('.', $fileName);
//         $imageExtension = strtolower(end($imageExtension));
//         if(!in_array($imageExtension, $validImageExtension)){
//             echo "<script> alert('Invalid Image Extension'); </script>";
//         }
//         else if($fileSize > 1000000){
//             echo "<script> alert('Image Size is Too Large'); </script>";
//         }
//         else{
//             $newImageName = uniqid();
//             $newImageName .= '.' . $imageExtension;

//             move_uploaded_file($tmpName, 'upload_prog/' . $newImageName);
//             $query = "INSERT INTO tbl_prog(`prog_name`, `prog_desc`, `prog_date`, `prog_venue`, `prog_link`, `prog_poster`) 
//             VALUES ('$prog_name','$prog_desc','$prog_date ','$prog_venue','$prog_link','$newImageName')";
//             mysqli_query($con, $query);
            
//             if($query){
//                 $_SESSION['status'] = "New Programme Successfully Added!";
//                 header("Location: /Inasis-Management/new_programme.php");
//             }
//             else{
//                 echo "Ops, Something went wrong";
//             } 
//         }
//     }
// }

//view programme details
// if(isset($_GET['edit'])){
//     $id = $_GET['edit'];
//     $update = true;
//     $result = $mysqli->query("SELECT * FROM tbl_prog WHERE id=$id") 
//     or die($mysqli->error);
//     if(count(array($result)) == 1){
//         $row = $result->fetch_array();
//         $prog_name = $row['prog_name'];
//         $prog_desc = $row['prog_desc'];
//         $prog_date = $row['prog_date'];
//         $prog_venue = $row['prog_venue'];
//         $prog_link = $row['prog_link'];
//         $prog_poster = $row['prog_poster'];
//     }
// }

?> 