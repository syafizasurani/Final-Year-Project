<?php
session_start();

// $conn = mysqli_connect("localhost", "root", "", "inasis_management");
// $con = mysqli_connect('localhost', 'root');
// mysqli_select_db($con, 'inasis_management');

// if(isset($_POST['submitupload'])){
//     $prog_name = $_POST['prog_name'];
//     $prog_desc = $_POST['prog_desc'];
//     $prog_date = $_POST['prog_date'];
//     $prog_venue = $_POST['prog_venue'];
//     $prog_link = $_POST['prog_link'];
//     $files = $_FILES['file'];
//     if($_FILES["image"]["error"] === 4){
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
//         else if($fileSize > 1000000000){
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book Appointment</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: "Poppins", sans-serif
    }

    body, html {
        height: 100%;
        line-height: 1.8;
    }

    .w3-bar .w3-button {
        padding: 16px;
    }

    form{
        padding: 20px;
    }

    .form-group input{
        height: 38px;
    }

    .w3-button{
        width: 150px;
    }

    .alert {
        padding: 20px;
        background-color: green;
        color: white;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }

    /* .w3-container form .form-details {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    } */
</style>
<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-indigo w3-card" id="myNavbar">
            <a href="menupage.php" class="w3-bar-item w3-button w3-bold"> < &nbsp Health Centre</a>
            <a href="healthcentre.php" class="w3-bar-item w3-button">Dashboard</a>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-button" title="Notifications">Facilities &nbsp <i class="fa fa-caret-down"></i></button>     
                <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                    <a href="clinic.php" class="w3-bar-item w3-button">Clinic</a>
                    <a href="dental.php" class="w3-bar-item w3-button">Dental</a>
                </div>
            </div>
            <a href="myappointment.php" class="w3-bar-item w3-button">My Appointment</a>
            <a href="book_appointment.php" class="w3-bar-item w3-button" style="color: #faff00;">Book New Appointment</a>
            <!-- Right-sided navbar links -->
            <div class="w3-right w3-hide-small">
                <a href="login.php" class="w3-bar-item w3-button">Logout</a>
            </div>
            <!-- Hide right-floated links on small screens and replace them with a menu icon -->
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium"
               onclick="w3_open()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>
    <!-- Form of adding new programme -->
    <div class="w3-container w3-white" style="padding:80px 100px" id="form">
    <h3 style="padding:30px 0px">Dental > Scaling Appointment</h3>
        <div class=" w3-light-grey w3-container w3-padding" style="border-radius:20px">
            <div style="margin-top:10px">
                <form action="server/update_appt.php" method="POST" enctype="multipart/form-data">
                    <?php
                    if(isset($_SESSION['status'])){
                        ?>
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong>Success.</strong> <?php echo $_SESSION['status']; ?>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                    ?>
                    <div class="w3-center">
                        <h3 style="font-weight: bold;">Book Appointment for Scaling Service</h3><br>
                    </div>
                    <div class="form-details">
                        <h4>Please fill in all the details</h4>
                        <div class="form-group">
                            <label>Service</label>
                            <input type="text" class="form-control" value="Dental - Scaling" placeholder="" name="service" readonly>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" value="" placeholder="Choose date" name="appt_date" required>
                        </div>
                        <div class="form-group">
                            <label>Slot/Time</label>
                            <select id="slot/time" name="slot" style="width: 100%; height:40px; border-radius: 5px;">
                                <option value="" disabled="" selected="">&nbsp; Choose slot/time</option>
                                <option value="Slot 1: 8.30am">&nbsp; Slot 1: 8.30am</option>
                                <option value="Slot 2: 10.00am">&nbsp; Slot 2: 10.00am</option>
                                <option value="Slot 3: 11.30am">&nbsp; Slot 3: 11.30am</option>
                                <option value="Slot 4: 2.30pm">&nbsp; Slot 4: 2.30pm</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" value="" placeholder="Enter full name" name="stud_name" required>
                        </div>
                        <div class="form-group">
                            <label>Matric No.</label>
                            <input type="text" class="form-control" value="" placeholder="Enter matric number" name="matric_no" required>
                        </div>
                        <div class="form-group">
                            <label>Semester</label>
                            <input type="text" class="form-control" value="" placeholder="Enter current semester" name="semester" required>
                        </div>
                        <div class="form-group">
                            <label>Phone No.</label>
                            <input type="text" class="form-control" value="" placeholder="Enter phone number (Eg: 012-XXXXXXX)" name="phone_no" required>
                        </div>
                        <div>
                            <p>
                                <button class="w3-button w3-indigo w3-right" type="submit" name="booksubmit" style="border-radius: 5px;">BOOK</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="w3-center w3-indigo w3-padding-64">
        <p>Powered by</p>
        <p>
            Need Help? Call : +604-928 6666 or Email : itservices@uum.edu.my © Copyright 2021 - Universiti Utara Malaysia
        </p>
    </footer>
    <script>
        // Toggle between showing and hiding the sidebar when clicking the menu icon
        var mySidebar = document.getElementById("mySidebar");
        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
            } else {
                mySidebar.style.display = 'block';
            }
        }
        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
        }
    </script>
</body>
</html>
