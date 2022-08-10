<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add New Programme</title>
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
</style>
<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-indigo w3-card" id="myNavbar">
            <a href="studentactivities.php" class="w3-bar-item w3-button w3-bold"> < &nbsp Student Activities</a>
            <a href="clubpage.php" class="w3-bar-item w3-button">Club Programme</a>
            <a href="new_programme.php" class="w3-bar-item w3-button" style="color: #faff00;">Add New Programme</a>
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
        <div style="margin-top:20px">
            <form action="server/add_process.php" method="POST" enctype="multipart/form-data">
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
                <h3 class="w3-left" style="font-weight: bold;">Add New Programme</h3><br>
                <br><p>Please fill in all the details</p>
                <div class="form-group" style="padding: 5px 0px">
                    <label>Programme Name</label>
                    <input type="text" class="form-control" value="" placeholder="Enter programme name" name="prog_name" required>
                </div>
                <div class="form-group" style="padding: 5px 0px">
                    <label>Description</label>
                    <textarea type="text" class="form-control" value="" placeholder="Enter programme description" name="prog_desc" required></textarea>
                </div>
                <div class="form-group" style="padding: 5px 0px">
                    <label>Programme Date</label>
                    <input type="date" class="form-control" value="" placeholder="Enter programme date" name="prog_date" required>
                </div>
                <div class="form-group" style="padding: 5px 0px">
                    <label>Venue</label>
                    <input type="text" class="form-control" value="" placeholder="Enter programme venue" name="prog_venue" required>
                </div>
                <div class="form-group" style="padding: 5px 0px">
                    <label>Link Registration</label>
                    <input type="text" class="form-control" value="" placeholder="Put registration link here" name="prog_link" required>
                </div>
                <div class="form-group" style="padding: 5px 0px">
                    <label>Upload Programme Poster</label>
                    <input type="file" class="form-control" value="" placeholder="Choose photo" name="file" accept=".jpg, .png, .jpeg" required>
                </div>
                <div>
                    <p>
                        <button class="w3-button w3-indigo w3-right" type="submit" name="submitupload" style="border-radius: 5px">SUBMIT</button>
                    </p>
                </div>
            </form>
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
