<!-- <?php
    include("../server/dbconfig.php");
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Appointment History</title>
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
            <a href="#" class="w3-bar-item w3-button w3-bold"> &nbsp Welcome to UUM Health Centre</a>
            <a href="../staff/pku_dashboard.php" class="w3-bar-item w3-button">Dashboard</a>
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
                <button class="w3-button" title="Notifications" style="color: #faff00;">Appointment History &nbsp <i class="fa fa-caret-down"></i></button>     
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
    <!-- Table of Appointment History -->
    <div class="w3-container w3-white" style="padding:150px 200px">
        <div class="w3-center w3-container" style="padding-top:10px; padding-bottom:10px">
            <h4><b>Filling Appointment History</b></h4>
        </div>
        <div class="w3-display w3-center w3-padding w3-container">
            <form class="search w3-padding-16" action="filling_history.php" method="POST">
                <input type="text" name="valueToSearch" placeholder="&nbsp Search by matric no." style="border-radius:10px; width:60%; height:38px">
                <button type="submit" name="search" value="Filter" style="border-radius:10px; background-color:#3E42A3; color:white; height:38px; width:15%"><i class="fa fa-search" style="color:white"></i>&nbsp Search</button>
            </form>
        </div>
        <div class="w3-display w3-center w3-padding w3-container">
            <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white" id="table">
                <thead>
                    <th style="text-align:center; display:none;">ID</th>
                    <th style="text-align:center">Matric No.</th>
                    <th style="text-align:center">Student Name</th>
                    <th style="text-align:center">Semester</th>
                    <th style="text-align:center">Service</th>
                    <th style="text-align:center">Date</th>
                    <th style="text-align:center">Slot/Time</th>
                    <th style="text-align:center">Phone No.</th>
                    <th style="text-align:center">Status</th>
                </thead>
                <tbody>
                    <?php 
                        if(isset($_POST['search'])){
                            $valueToSearch = $_POST['valueToSearch'];
                            $query = "SELECT * FROM filling_history WHERE `matric_no` LIKE  '%".$valueToSearch."%'";
                            $search_results = filterTable($query);
                        }
                        else{
                            $query = "SELECT * FROM filling_history";
                            $search_results = filterTable($query);
                        }
                        function filterTable($query){
                            $connect = mysqli_connect('localhost', 'root', "", "hep_staff");
                            $filter_Results = mysqli_query($connect, $query);
                            return $filter_Results;
                        }
                    ?>
                    <?php while($result = mysqli_fetch_array($search_results)): ?>
                        <tr>
                            <td style="text-align:center; display:none;"> <?php echo $result['id']; ?> </td>
                            <td style="text-align:center"><a href="view_appointment.php?view=<?php echo $result['id']; ?>"><?php echo $result['matric_no']; ?></a></td>
                            <td style="text-align:center"> <?php echo $result['stud_name']; ?> </td>
                            <td style="text-align:center"> <?php echo $result['semester']; ?> </td>
                            <td style="text-align:center"> <?php echo $result['service']; ?> </td>
                            <td style="text-align:center"> <?php echo $result['appt_date']; ?> </td>
                            <td style="text-align:center"> <?php echo $result['slot']; ?> </td>
                            <td style="text-align:center"> <?php echo $result['phone_no']; ?> </td>
                            <td style="color: green; text-align:center;"><b>Completed</b></td>
                        </tr>  
                    <?php endwhile; ?>                          
                </tbody>
            </table>
        </div>
    </div>
    <!-- Footer -->
    <footer class="w3-center w3-indigo w3-padding-64">
        <p>Powered by</p>
        <p>
            Need Help? Call : +604-928 6666 or Email : itservices@uum.edu.my ?? Copyright 2021 - Universiti Utara Malaysia
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

    </script>
</body>
</html>