<?php
    include("server/dbconnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Appointment</title>
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
            <a href="menupage.php" class="w3-bar-item w3-button w3-bold"> < &nbsp Health Centre</a>
            <a href="healthcentre.php" class="w3-bar-item w3-button">Dashboard</a>
            <div class="w3-dropdown-hover w3-hide-small">
                <button class="w3-button" title="Notifications">Facilities &nbsp <i class="fa fa-caret-down"></i></button>     
                <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                    <a href="clinic.php" class="w3-bar-item w3-button">Clinic</a>
                    <a href="dental.php" class="w3-bar-item w3-button">Dental</a>
                </div>
            </div>
            <a href="myappointment.php" class="w3-bar-item w3-button" style="color: #faff00;">My Appointment</a>
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
    <!-- Table of My Appointment -->
    <div class="w3-container w3-white" style="padding:350px 0px">
        <div class="w3-display-middle w3-card" style="width:70%">
            <div class="w3-bar w3-indigo">
                <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Upcoming');"><i class="fa fa-user w3-margin-right"></i>Upcoming Appointment</button>
                <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Completed');"><i class="fa fa-home w3-margin-right"></i>Completed Appointment</button>
            </div>
            <!-- Tabs Upcoming Appointment-->
            <div id="Upcoming" class="w3-container w3-white w3-padding-16 myLink">
                <h3 class="w3-left">Your Upcoming Appointment</h3><br>
                <div class="w3-display-bottom w3-white" style="size: 5px 5px">
                <a href="book_appointment.php" class="w3-bar-item w3-btn w3-blue-grey w3-right" style="border-radius: 5px"><i class="fa fa-plus w3-margin-right"></i>Book New Appointment</a><br>
                </div><br>
                <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white" id="table">
                    <thead>
                        <th style="text-align:center; display:none;">ID</th>
                        <th style="text-align:center">Appointment</th>
                        <th style="text-align:center">Date</th>
                        <th style="text-align:center">Slot/Time</th>
                        <th style="text-align:center">Status</th>
                        <th style="text-align:center">Action</th>
                    </thead>
                        <tbody>
                        <?php
                            $con = mysqli_connect('localhost', 'root');
                            mysqli_select_db($con, 'hep_student');

                            $displayquery = "SELECT * FROM tbl_appointment";
                            $querydisplay = mysqli_query($con, $displayquery);
                                    
                            while($result = mysqli_fetch_array($querydisplay)){
                                ?>
                                <tr>
                                    <td style="text-align:center; display:none;"> <?php echo $result['id']; ?> </td>
                                    <td style="text-align:center"><a href="view_appointment.php?view=<?php echo $result['id']; ?>"><?php echo $result['service']; ?></a></td>
                                    <td style="text-align:center"> <?php echo $result['appt_date']; ?> </td>
                                    <td style="text-align:center"> <?php echo $result['slot']; ?> </td>
                                    <td style="color: green; text-align:center;"><b>Booked</b></td>
                                    <td style="text-align:center">
                                        <a class='btn btn-primary btn-sm downloadbtn' href="server/generate_pdf.php?view=<?php echo $result['id']; ?>" target="_blank">Download</a>
                                        <a class='btn btn-danger btn-sm deletebtn' type='button'>Cancel</a>
                                    </td>
                                </tr>                            
                                <?php
                            }
                        ?> 
                        </tbody>
                </table>
            </div>
            <!-- Tabs Completed Appointment-->
            <div id="Completed" class="w3-container w3-white w3-padding-16 myLink">
                <h3 class="w3-left">Your Completed Appointment</h3><br>
                <div class="w3-display-bottom w3-white" style="size: 5px 5px">
                    <a href="book_appointment.php" class="w3-bar-item w3-btn w3-blue-grey w3-right" style="border-radius: 5px"><i class="fa fa-plus w3-margin-right"></i>Book New Appointment</a><br>
                </div><br>
                <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white" id="table">
                    <thead>
                        <th style="text-align:center">Appointment</th>
                        <th style="text-align:center">Date</th>
                        <th style="text-align:center">Slot/Time</th>
                        <th style="text-align:center">Status</th>
                        <th style="text-align:center">Action</th>
                    </thead>
                    <tbody>
                        <?php
                            $con = mysqli_connect('localhost', 'root');
                            mysqli_select_db($con, 'hep_student');

                            $displayquery = "SELECT * FROM tbl_completed_appointment";
                            $querydisplay = mysqli_query($con, $displayquery);
                                    
                            while($result = mysqli_fetch_array($querydisplay)){
                                ?>
                                <tr>
                                    <td style="text-align:center; display:none;"> <?php echo $result['id']; ?> </td>
                                    <td style="text-align:center"><a href="view_appointment.php?view=<?php echo $result['id']; ?>"><?php echo $result['service']; ?></a></td>
                                    <td style="text-align:center"> <?php echo $result['appt_date']; ?> </td>
                                    <td style="text-align:center"> <?php echo $result['slot']; ?> </td>
                                    <td style="color: green; text-align:center;"><b>Completed</b></td>
                                    <td style="text-align:center">
                                        <a class='btn btn-primary btn-sm downloadbtn' href="server/generate_pdf.php?view=<?php echo $result['id']; ?>" target="_blank">Download</a>
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
    <!-- Cancel Confirmation Message -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:red">Cancel Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="server/delete_appt.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">
                        <h5>Are you sure want to cancel this appointment?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" name="deletedata" class="btn btn-primary">Yes, Cancel it</button>
                        <!-- <button type="submit" name="deletedata" class="btn btn-primary" href="server/delete_appt.php?delete=<?php echo $result['id']; ?>">Yes, Cancel it</button> -->
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('.deletebtn').on('click', function(){
                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#delete_id').val(data[0]);
            });
        });
    </script>

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