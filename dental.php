<?php
    include("server/dbconnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PKU Dental</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
            <a href="menupage.php" class="w3-bar-item w3-button w3-bold"> < &nbsp Health Centre</a>
            <a href="healthcentre.php" class="w3-bar-item w3-button">Dashboard</a>
            <div class="w3-dropdown-hover w3-hide-small" style="color: #faff00;">
                <button class="w3-button" title="Notifications">Facilities &nbsp <i class="fa fa-caret-down"></i></button>     
                <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                    <a href="clinic.php" class="w3-bar-item w3-button">Clinic</a>
                    <a href="dental.php" class="w3-bar-item w3-button">Dental</a>
                </div>
            </div>
            <!-- <a href="#" class="w3-bar-item w3-button">Facilities</a> -->
            <a href="myappointment.php" class="w3-bar-item w3-button">My Appointment</a>
            <a href="book_appointment.php" class="w3-bar-item w3-button">Book New Appointment</a>
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
    <div class="w3-container w3-white" style="padding:80px 80px">
        <div class="w3-left" style="padding-top:10px; padding-bottom:10px">
            <h4 style="padding: 0px 7px"><b>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Dental Service</b></h4>
        </div>
        <div class="w3-display w3-center w3-padding">
            <img class="w3-image w3-card" src="image/pku1.jpg" alt="Clinic" width="1190" height="200">
        </div>
        <!-- Table of My Appointment -->
        <div class="w3-container" style="padding:140px 50px;">
            <div class="w3-display-bottommiddle w3-card" style="width:65%; height:63%;">
                <div class="w3-bar w3-indigo">
                    <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Operation Time');" style="width: 50%;"><i class="fas fa-clock w3-margin-right"></i>Operation Time</button>
                    <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Services');" style="width: 50%;"><i class="fas fa-concierge-bell w3-margin-right"></i>Services</button>
                </div>
                <!-- Tabs Operation Time-->
                <div id="Operation Time" class="w3-container w3-white myLink">
                <h4 class="w3-center" style="color:green; letter-spacing: 4px; padding-top: 30px"><b>OPEN EVERYDAY</b></h4>
                    <h4 class="w3-center" style="color:#CBCE22;"><b>8.00 am - 5.00 pm</b></h4>
                    <div class="desciption" style="padding: 2px 80px">
                        <p class="w3-left">Attention to all patient, 
                        <br>Below are the estimation time of dental services:</p>
                    </div>
                    <div class="w3-row-padding w3-center" style="margin-top:20px">
                        <div class="w3-quarter" style="margin-top:20px">
                            <h4><b>Filling</b></h4>
                            <p class="">(Tampalan)</p>
                            <h5 style="color:blue">30 - 40 min</h5>
                        </div>
                        <div class="w3-quarter" style="margin-top:20px">
                            <h4><b>Removing</b></h4>
                            <p class="">(Cabutan)</p>
                            <h5 style="color:blue">30 - 50 min</h5>
                        </div>
                        <div class="w3-quarter" style="margin-top:20px">
                            <h4><b>Scaling</b></h4>
                            <p class="">(Cuci Gigi)</p>
                            <h5 style="color:blue">20 - 40 min</h5>
                        </div>
                        <div class="w3-quarter" style="margin-top:20px">
                            <h4 style="color:red"><b>Emergency Case</b></h4>
                            <p class="">(Kecemasan)</p>
                            <h5 style="color:blue">10 - 15 min</h5>
                        </div>
                    </div>
                    <div class="desciption" style="margin-top:20px">
                        <h6 class="w3-center">Your waiting time also depends on the number of patients who are waiting to receive 
                        <br>treatment from the time you register</h6>
                    </div>
                </div>
                <!-- Tabs Services-->
                <div id="Services" class="w3-container w3-white myLink">
                    <div class="w3-row-padding w3-center" style="margin-top:20px">
                        <div class="w3-quarter" style="margin-top:8px">
                            <h5><b>Filling</b></h5>
                            <p class="">(Tampalan)</p>
                            <hr class="w3-border-grey" style="margin:auto; width:90%">
                            <p style="margin-top:5px;">Filling service only available in counter.</p>
                            <p style="color:#29A714;"><b>Please refer to PKU counter to book your appointment</b></p>
                            <p>OR<br>Contact us for further information: Tel: +604-928 2460 / 2525</p>
                        </div>
                        <div class="w3-quarter" style="margin-top:8px">
                            <h5><b>Removing</b></h5>
                            <p class="">(Cabutan)</p>
                            <hr class="w3-border-grey" style="margin:auto; width:90%">
                            <p style="margin-top:5px;">Filling service only available in counter.</p>
                            <p style="color:#29A714;"><b>Please refer to PKU counter to book your appointment</b></p>
                            <p>OR<br>Contact us for further information: Tel: +604-928 2460 / 2525</p>
                        </div>
                        <div class="w3-quarter" style="margin-top:8px">
                            <h5><b>Scaling</b></h5>
                            <p class="">(Cuci Gigi)</p>
                            <hr class="w3-border-grey" style="margin:auto; width:90%">
                            <p style="margin-top:5px;">Available everyday. Book your appointment now.</p>
                            <p>OR<br>Contact us for further information: Tel: +604-928 2460 / 2525</p>
                            <div class="w3-display-bottom w3-white" style="size: 5px 5px; margin-top:10px">
                                <a href="book_appointment.php" class="w3-bar-item w3-btn w3-indigo w3-center" style="border-radius:5px; width:80%">Book Now &nbsp > </a><br>
                            </div>
                        </div>
                        <div class="w3-quarter" style="margin-top:8px">
                            <h5 style="color:red"><b>Emergency Case</b></h5>
                            <p class="">(Kecemasan)</p>
                            <hr class="w3-border-grey" style="margin:auto; width:90%">
                            <p style="margin-top:5px;">Special case only.<br></p>
                            <p style="color:#29A714;"><b><br>Please refer to PKU counter to book your appointment</b></p>
                            <p>OR<br>Contact us for further information: Tel: +604-928 2460 / 2525</p>
                        </div>
                </div>
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