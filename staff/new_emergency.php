<?php
    include("../server/dbconnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Emergency Case</title>
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
</style>
<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-indigo w3-card" id="myNavbar">
            <a href="#" class="w3-bar-item w3-button w3-bold"> &nbsp Welcome to UUM Health Centre</a>
            <a href="../staff/pku_dashboard.php" class="w3-bar-item w3-button">Dashboard</a>
            <a href="../staff/appointment_list.php" class="w3-bar-item w3-button">Appointment List</a>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-button" title="Notifications" style="color: #faff00;">New Appointment &nbsp <i class="fa fa-caret-down"></i></button>     
                <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                    <a href="../staff/new_filling.php" class="w3-bar-item w3-button">Filling Treatment</a>
                    <a href="../staff/new_removing.php" class="w3-bar-item w3-button">Removing Treatment</a>
                    <a href="../staff/new_scaling.php" class="w3-bar-item w3-button">Scaling Treatment</a>
                    <a href="../staff/new_emergency.php" class="w3-bar-item w3-button">Emergency Case</a>
                </div>
            </div>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-button" title="Notifications">Appointment History &nbsp <i class="fa fa-caret-down"></i></button>     
                <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                    <a href="../staff/filling_history.php" class="w3-bar-item w3-button">Filling Treatment</a>
                    <a href="../staff/removing_history.php" class="w3-bar-item w3-button">Removing Treatment</a>
                    <a href="../staff/scaling_history.php" class="w3-bar-item w3-button">Scaling Treatment</a>
                    <a href="../staff/emergency_history.php" class="w3-bar-item w3-button">Emergency Case</a>
                </div>
            </div>
            <!-- Right-sided navbar links -->
            <div class="w3-right w3-hide-small">
                <a href="../login.php" class="w3-bar-item w3-button">Logout</a>
            </div>
            <!-- Hide right-floated links on small screens and replace them with a menu icon -->
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium"
               onclick="w3_open()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>
    <!-- Form of adding new programme -->
    <div class="w3-container w3-white" style="padding:80px 150px" id="form">
    <h4 style="padding:30px 0px">Dental > Emergency Case Report</h4>
        <div class=" w3-light-grey w3-container w3-padding" style="border-radius:20px">
            <div style="margin-top:10px">
                <form action="server/add_emergency.php" method="POST" enctype="multipart/form-data">
                    <?php
                    if(isset($_SESSION['add_status'])){
                        ?>
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong>Success.</strong> <?php echo $_SESSION['add_status']; ?>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                    ?>
                    <div class="w3-center">
                        <h4 style="font-weight: bold;">Report of Emergency Case</h4><br>
                    </div>
                    <div class="form-details">
                        <h5>Please fill in all the details</h5>
                        <div class="form-group" style="padding: 5px 0px">
                            <label>Service</label>
                            <input type="text" class="form-control" value="Dental - Emergency Case" placeholder="" name="service" readonly>
                        </div>
                        <div class="form-group" style="padding: 5px 0px">
                            <label>Date</label>
                            <input type="date" class="form-control" value="" placeholder="Choose date" name="case_date" required>
                        </div>
                        <div class="form-group" style="padding: 5px 0px">
                            <label>Time</label>
                            <input type="text" class="form-control" value="" placeholder="Enter case time" name="case_time" required>
                        </div>
                        <div class="form-group" style="padding: 5px 0px">
                            <label>Name</label>
                            <input type="text" class="form-control" value="" placeholder="Enter full name" name="stud_name" required>
                        </div>
                        <div class="form-group" style="padding: 5px 0px">
                            <label>Matric No.</label>
                            <input type="text" class="form-control" value="" placeholder="Enter matric number" name="matric_no" required>
                        </div>
                        <div class="form-group" style="padding: 5px 0px">
                            <label>Semester</label>
                            <input type="text" class="form-control" value="" placeholder="Enter current semester" name="semester" required>
                        </div>
                        <div class="form-group" style="padding: 5px 0px">
                            <label>Phone No.</label>
                            <input type="text" class="form-control" value="" placeholder="Enter phone number (Eg: 012-XXXXXXX)" name="phone_no" required>
                        </div>
                        <div class="form-group" style="padding: 5px 0px">
                            <label>Case Details</label>
                            <textarea type="text" class="form-control" value="" placeholder="Enter description" name="case_details" required></textarea>
                        </div>
                        <div>
                            <p>
                                <button class="w3-button w3-indigo w3-right" type="submit" name="submit_case" style="border-radius: 5px; width: 150px;">SUBMIT</button>
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
        // Tabs
        function openLink(evt, linkName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("myLink");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
            }
            document.getElementById(linkName).style.display = "block";
            evt.currentTarget.className += " w3-red";
        }
        // Click on the first tablink on load
        document.getElementsByClassName("tablink")[0].click();

        // $(document).ready(function() {
        //     $('.viewbtn').on('click', function(){
        //         $().modal('show');
        //     });
        // });

    </script>
</body>
</html>