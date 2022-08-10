<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Activities</title>
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

    .alert {
        padding: 20px;
        background-color: slateblue;
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
            <a href="studentactivities.php" class="w3-bar-item w3-button w3-bold"> < &nbsp Student Activities</a>
            <a href="clubpage.php" class="w3-bar-item w3-button" style="color: #faff00;">Club Programme</a>
            <a href="new_programme.php" class="w3-bar-item w3-button">Add New Programme</a>
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
    <!-- Table of Mangsa Bencana Banjir -->
    <div class="w3-container w3-white" style="padding:350px 0px">
        <div class="w3-display-middle w3-card" style="width:70%">
            <!-- Tabs Mangsa-->
            <div id="Activities" class="w3-container w3-white w3-padding-16 myLink">
            <?php
                if(isset($_SESSION['status'])){
                    ?>
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>Done.</strong> <?php echo $_SESSION['status']; ?>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
                ?>
                <h3 class="w3-center w3-bold">List of Club Programme</h3><br>
                <div class="w3-display-bottom w3-white" style="size: 5px 5px">
                    <a href="new_programme.php" class="w3-bar-item w3-btn w3-indigo w3-right"><i class="fa fa-plus w3-margin-right"></i>New Programme</a><br>
                </div><br>
                <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white" id="table">
                    <thead>
                        <th style="text-align:center">Poster</th>
                        <th style="text-align:center">Programme</th>
                        <th style="text-align:center">Date</th>
                        <th style="text-align:center">Venue</th>
                        <th style="text-align:center">Status</th>
                        <th style="text-align:center">Action</th>
                    </thead>
                    <tbody>
                        <?php
                            $con = mysqli_connect('localhost', 'root');
                            mysqli_select_db($con, 'hep_student');

                            $displayquery = "SELECT * FROM tbl_prog";
                            $querydisplay = mysqli_query($con, $displayquery);

                            while($result = mysqli_fetch_array($querydisplay)){
                                        
                            ?>
                            <tr>
                                <td style="text-align:center"> <img src=" <?php echo $result['prog_poster']; ?> " height="100px" width="100px"> </td>
                                <td style="text-align:center"> <?php echo $result['prog_name']; ?> </td>
                                <td style="text-align:center"> <?php echo $result['prog_date']; ?> </td>
                                <td style="text-align:center"> <?php echo $result['prog_venue']; ?> </td>
                                <td style="color: green; text-align:center;"><b>Available</b></td>
                                <td style="text-align:center">
                                    <a class='btn btn-danger btn-sm deletebtn' href="server/delete_process.php?delete=<?php echo $result['id']; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                            }
                        ?> 
                    </tbody>
                </table>
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
    </script>
</body>
</html>