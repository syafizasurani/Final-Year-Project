<?php
session_start();
  
$con = mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'hep_student');

//view programme details
if(isset($_GET['view'])){
    $id = $_GET['view'];
    $update = true;
    $sql = "SELECT * FROM tbl_prog WHERE id=$id";
    
    $querydisplay = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($querydisplay);

    $prog_name = $result['prog_name'];
    $prog_desc = $result['prog_desc'];
    $prog_date = $result['prog_date'];
    $prog_venue = $result['prog_venue'];
    $prog_link = $result['prog_link'];
    $prog_poster = $result['prog_poster'];
}

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
        padding: 10px;
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
            <!-- Right-sided navbar links -->
            <div class="w3-right w3-hide-small">
                <!-- <a href="clubpage.php" class="w3-bar-item w3-button">Club Programme</a>
                <a href="new_programme.php" class="w3-bar-item w3-button">Add New Programme</a> -->
                <a href="login.php" class="w3-bar-item w3-button">Logout</a>
            </div>
            <!-- Hide right-floated links on small screens and replace them with a menu icon -->
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium"
               onclick="w3_open()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>
    <!-- Promo Section - "We know design" -->
    <br>
    <div class="w3-container" style="padding:120px 120px">
        <div class="w3-row-padding">
            <div class="w3-col m6">
                <img class="w3-image w3-round-large" src="<?php echo $prog_poster; ?>" alt="Photo" width="500" height="400">
            </div>
            <div class="w3-col m6">
                <div class="w3-card" style="padding: 20px">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Programme Name</label>
                            <input type="text" class="form-control" value="<?php echo $prog_name; ?>" placeholder="Enter programme name" name="prog_name" readonly>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" value="" placeholder="Enter programme description" name="prog_desc" readonly> <?php echo $result['prog_desc']; ?> </textarea>
                        </div>
                        <div class="form-group">
                            <label>Programme Date</label>
                            <input type="date" class="form-control" value="<?php echo $prog_date; ?>" placeholder="Enter programme date" name="prog_date" readonly>
                        </div>
                        <div class="form-group">
                            <label>Venue</label>
                            <input type="text" class="form-control" value="<?php echo $prog_venue; ?>" placeholder="Enter programme venue" name="prog_venue" readonly>
                        </div>
                        <div class="form-group">
                            <label>Link Registration</label>
                            <input type="text" class="form-control" value="<?php echo $prog_link; ?>" placeholder="Put registration link here" name="prog_link" readonly>
                        </div>
                        <div style="padding: 10px 0px">
                            <a class='btn btn-primary btn-sm' href="studentactivities.php" style="font-size:15px">< &nbsp Back</a>
                        </div>
                    </form>
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
    </script>
</body>
</html>
