<!DOCTYPE html>
<html lang="en">

<head>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Raleway", sans-serif
        }

        .w3-quarter img {
            margin-bottom: -6px;
            cursor: pointer
        }

        .w3-quarter img:hover {
            opacity: 0.6;
            transition: 0.3s
        }
    </style>
</head>

<body class="w3-light-grey">
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-black w3-animate-right w3-top w3-text-light-grey w3-large"
        style="z-index:3;width:250px;font-weight:bold;display:none;right:0;" id="mySidebar">
        <a href="javascript:void()" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-32">CLOSE</a>
        <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-16">PORTFOLIO</a>
        <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-16">ABOUT ME</a>
        <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-16">CONTACT</a>
    </nav>

    <!-- Top menu on small screens -->
    <header class="w3-container w3-top w3-gray w3-xlarge w3-padding-32">
        <span class="w3-left w3-padding">WELCOME TO HEP INASIS MANAGEMENT SYSTEM</span>
        <!-- <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a> -->
    </header>

    <div class="w3-top">
        <div class="w3-bar w3-indigo w3-card" >
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

    <script>
        // Script to open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }

        // Modal Image Gallery
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
            var captionText = document.getElementById("caption");
            captionText.innerHTML = element.alt;
        }
    </script>
</body>
</html>
