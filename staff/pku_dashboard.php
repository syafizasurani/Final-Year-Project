<?php
    include("server/dbconfig.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PKU Staff Dashboard</title>
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

    #table td, #table th {
        border: 1px solid #ddd;
        padding: 9px;
    }

    #table th {
        background-color: lightgray;
        color: black;
    }
</style>
<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-indigo w3-card" id="myNavbar">
            <a class="w3-bar-item w3-button w3-bold">&nbsp Welcome to UUM Health Centre</a>
            <a href="../staff/pku_dashboard.php" class="w3-bar-item w3-button" style="color: #faff00;">Dashboard</a>
            <a href="../staff/appointment_list.php" class="w3-bar-item w3-button">Appointment List</a>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-button" title="Notifications">New Appointment &nbsp <i class="fa fa-caret-down"></i></button>     
                <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                    <a href="../staff/new_filling.php" class="w3-bar-item w3-button">Filling Treatment</a>
                    <a href="../staff/new_removing.php" class="w3-bar-item w3-button">Removing Treatment</a>
                    <a href="../staff/new_scaling.php" class="w3-bar-item w3-button">Scaling Treatment</a>
                    <a href="../staff/new_emergency.php" class="w3-bar-item w3-button">Emergency Case</a>
                </div>
            </div>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-button" title="Notifications">Appointment Record &nbsp <i class="fa fa-caret-down"></i></button>     
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
    <div class="w3-container w3-white" style="padding:80px 80px">
        <!-- Dashboard -->
        <div class="w3-main" style="margin-top:0px; margin-bottom:100px">
            <header class="w3-container" style="padding-top:50px">
                <h4><b>DASHBOARD</b></h4>
                <div class="w3-display-bottom w3-white" style="size: 5px 5px">
                    <a href="../staff/appointment_list.php" class="w3-bar-item w3-btn w3-blue-grey w3-right" style="border-radius: 5px">View Appointment List &nbsp > </a><br>
                </div><br>
            </header>
            <div class="w3-row-padding w3-margin-bottom">
                <div class="w3-quarter">
                    <div class="w3-container w3-green w3-padding-24" style="border-radius:10px;">
                        <div class="w3-left"></div>
                        <div class="w3-right">
                            <?php
                                $query = "SELECT id FROM filling_appointment ORDER BY id";
                                $query_run = mysqli_query($conn, $query); 

                                $row = mysqli_num_rows($query_run);
                                echo "<h3>" .$row. "</h3>";
                            ?>
                            </div>
                        <div class="w3-clear"></div>
                        <h5>Filling Appointment</h5>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-indigo w3-padding-24" style="border-radius: 10px">
                        <div class="w3-left"></div>
                        <div class="w3-right">
                            <?php
                                $query = "SELECT id FROM removing_appointment ORDER BY id";
                                $query_run = mysqli_query($conn, $query); 

                                $row = mysqli_num_rows($query_run);
                                echo "<h3>" .$row. "</h3>";
                            ?>
                        </div>
                        <div class="w3-clear"></div>
                        <h5>Removing Appointment</h5>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-purple w3-padding-24" style="border-radius: 10px">
                        <div class="w3-left"></div>
                        <div class="w3-right">
                            <?php
                                $query = "SELECT id FROM scaling_appointment ORDER BY id";
                                $query_run = mysqli_query($conn, $query); 

                                $row = mysqli_num_rows($query_run);
                                echo "<h3>" .$row. "</h3>";
                            ?>
                        </div>
                        <div class="w3-clear"></div>
                        <h5>Scaling Appointment</h5>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-deep-orange w3-padding-24" style="border-radius: 10px">
                        <div class="w3-left"></div>
                        <div class="w3-right">
                            <?php
                                $query = "SELECT id FROM emergency_case ORDER BY id";
                                $query_run = mysqli_query($conn, $query); 

                                $row = mysqli_num_rows($query_run);
                                echo "<h3>" .$row. "</h3>";
                            ?>
                        </div>
                        <div class="w3-clear"></div>
                        <h5>Emergency Case</h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- Second Grid -->
        <h4><b> ABOUT HEALTH CENTRE </b></h4>
        <div class=" w3-light-grey w3-container w3-padding">
            <div class="w3-third" style="padding: 0px 10px">
                <img class="w3-image w3-round-large" src="../image/pusat-kesihatan-universiti.jpg" alt="Photo" width="500" height="400">
            </div>
            <div class="w3-twothird" style="padding: 0px 10px">
                <h3><b>UNIVERSITY HEALTH CENTRE</b></h3>
                <p class="w3-text-black">The University Health Centre (PKU) provides medical treatment to students, staff and outsiders. It also offers guidance and education in health matters to promote good health and prevent diseases. <br>
                <br>
                Services include diagnosis and treatment of illnesses, dental and prescription medications and a variety of vaccinations and immunisations. <br>
                <br>
                CONTACT US <br>
                Tel: +604-928 2460 / 2525 <br>
                Fax: +604-928 2450 <br>
                Email: medic@uum.edu.my</p>
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