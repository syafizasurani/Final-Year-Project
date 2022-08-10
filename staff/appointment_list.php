<!DOCTYPE html>
<html lang="en">
<head>
    <title>Appointment List</title>
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
            <a href="../staff/appointment_list.php" class="w3-bar-item w3-button" style="color: #faff00;">Appointment List</a>
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
    <!-- Table of My Appointment -->
    <div class="w3-container w3-white" style="padding:400px 0px">
        <div class="w3-display-middle w3-card" style="width:70%">
            <div class="w3-bar w3-indigo">
                <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Filling');"><i class="fa fa-user w3-margin-right"></i>Filling Appointment</button>
                <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Removing');"><i class="fa fa-home w3-margin-right"></i>Removing Appointment</button>
                <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Scaling');"><i class="fa fa-home w3-margin-right"></i>Scaling Appointment</button>
            </div>
            <!-- Tabs Filling Appointment-->
            <div id="Filling" class="w3-container w3-white w3-padding-16 myLink">
                <form class="search w3-padding-16" action="appointment_list.php" method="POST">
                    <input type="text" name="valueToSearch" placeholder="&nbsp Search by matric no." style="border-radius:10px; width:60%; height:38px">
                    <button type="submit" name="search" value="Filter" style="border-radius:10px; background-color:#3E42A3; color:white; height:38px; width:15%"><i class="fa fa-search" style="color:white"></i>&nbsp Search</button>
                    <a href="../staff/new_filling.php" class="w3-bar-item w3-btn w3-blue-grey w3-right" style="border-radius: 10px; height:38px;"><i class="fa fa-plus w3-margin-right"></i>Book New Appointment</a><br>
                </form>  
                <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white" id="table">
                    <thead>
                        <th style="text-align:center; display:none;">ID</th>
                        <th style="text-align:center">Matric No.</th>
                        <th style="text-align:center">Student Name</th>
                        <th style="text-align:center">Semester</th>
                        <th style="text-align:center">Phone No.</th>
                        <th style="text-align:center">Date</th>
                        <th style="text-align:center">Slot/Time</th>
                        <th style="text-align:center">Action</th>
                    </thead>
                    <tbody>
                        <?php 
                            if(isset($_POST['search'])){
                                $valueToSearch = $_POST['valueToSearch'];
                                $query = "SELECT * FROM filling_appointment WHERE `matric_no` LIKE  '%".$valueToSearch."%'";
                                $search_results = filterTable($query);
                            }
                            else{
                                $query = "SELECT * FROM filling_appointment";
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
                                <td style="text-align:center"> <?php echo $result['phone_no']; ?> </td>
                                <td style="text-align:center"> <?php echo $result['appt_date']; ?> </td>
                                <td style="text-align:center"> <?php echo $result['slot']; ?> </td>
                                <td style="text-align:center">
                                    <a class='btn btn-success btn-sm completebtn' type='button'>Complete</a>
                                </td>
                            </tr>                            
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <!-- Tabs Removing Appointment-->
            <div id="Removing" class="w3-container w3-white w3-padding-16 myLink">
                <form class="search w3-padding-16" action="appointment_list.php" method="POST">
                    <input type="text" name="valueToSearchRemoving" placeholder="&nbsp Search by matric no." style="border-radius:10px; width:60%; height:38px">
                    <button type="submit" name="search_removing" value="Filter" style="border-radius:10px; background-color:#3E42A3; color:white; height:38px; width:15%"><i class="fa fa-search" style="color:white"></i>&nbsp Search</button>
                    <a href="../staff/new_removing.php" class="w3-bar-item w3-btn w3-blue-grey w3-right" style="border-radius: 10px; height:38px;"><i class="fa fa-plus w3-margin-right"></i>Book New Appointment</a><br>
                </form>
                <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white" id="table">
                    <thead>
                        <th style="text-align:center; display:none;">ID</th>
                        <th style="text-align:center">Matric No.</th>
                        <th style="text-align:center">Student Name</th>
                        <th style="text-align:center">Semester</th>
                        <th style="text-align:center">Phone No.</th>
                        <th style="text-align:center">Date</th>
                        <th style="text-align:center">Slot/Time</th>
                        <th style="text-align:center">Action</th>
                    </thead>
                    <tbody>
                        <?php 
                            if(isset($_POST['search_removing'])){
                                $valueToSearchRemoving = $_POST['valueToSearchRemoving'];
                                $query = "SELECT * FROM removing_appointment WHERE `matric_no` LIKE  '%".$valueToSearchRemoving."%'";
                                $search_results_removing = filterTable_removing($query);
                            }
                            else{
                                $query = "SELECT * FROM removing_appointment";
                                $search_results_removing = filterTable_removing($query);
                            }
                            function filterTable_removing($query){
                                $connect = mysqli_connect('localhost', 'root', "", "hep_staff");
                                $filter_Results_removing = mysqli_query($connect, $query);
                                return $filter_Results_removing;
                            }
                        ?>
                        <?php while($result = mysqli_fetch_array($search_results_removing)): ?>
                            <tr>
                                <td style="text-align:center; display:none;"> <?php echo $result['id']; ?> </td>
                                <td style="text-align:center"><a href="view_appointment.php?view=<?php echo $result['id']; ?>"><?php echo $result['matric_no']; ?></a></td>
                                <td style="text-align:center"> <?php echo $result['stud_name']; ?> </td>
                                <td style="text-align:center"> <?php echo $result['semester']; ?> </td>
                                <td style="text-align:center"> <?php echo $result['phone_no']; ?> </td>
                                <td style="text-align:center"> <?php echo $result['appt_date']; ?> </td>
                                <td style="text-align:center"> <?php echo $result['slot']; ?> </td>
                                <td style="text-align:center">
                                    <a class='btn btn-success btn-sm removebtn' type='button'>Complete</a>
                                </td>
                            </tr>                            
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <!-- Tabs Scaling Appointment-->
            <div id="Scaling" class="w3-container w3-white w3-padding-16 myLink">
                <form class="search w3-padding-16" action="appointment_list.php" method="POST">
                    <input type="text" name="valueToSearchScaling" placeholder="&nbsp Search by matric no." style="border-radius:10px; width:60%; height:38px">
                    <button type="submit" name="search_scaling" value="Filter" style="border-radius:10px; background-color:#3E42A3; color:white; height:38px; width:15%"><i class="fa fa-search" style="color:white"></i>&nbsp Search</button>
                    <a href="../staff/new_scaling.php" class="w3-bar-item w3-btn w3-blue-grey w3-right" style="border-radius: 10px; height:38px;"><i class="fa fa-plus w3-margin-right"></i>Book New Appointment</a><br>
                </form>
                <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white" id="table">
                    <thead>
                        <th style="text-align:center; display:none;">ID</th>
                        <th style="text-align:center">Matric No.</th>
                        <th style="text-align:center">Student Name</th>
                        <th style="text-align:center">Semester</th>
                        <th style="text-align:center">Phone No.</th>
                        <th style="text-align:center">Date</th>
                        <th style="text-align:center">Slot/Time</th>
                        <th style="text-align:center">Action</th>
                    </thead>
                    <tbody>
                        <?php 
                            if(isset($_POST['search_scaling'])){
                                $valueToSearchScaling = $_POST['valueToSearchScaling'];
                                $query = "SELECT * FROM scaling_appointment WHERE `matric_no` LIKE  '%".$valueToSearchScaling."%'";
                                $search_results_scaling = filterTable_scaling($query);
                            }
                            else{
                                $query = "SELECT * FROM scaling_appointment";
                                $search_results_scaling = filterTable_scaling($query);
                            }
                            function filterTable_scaling($query){
                                $connect = mysqli_connect('localhost', 'root', "", "hep_staff");
                                $filter_Results_scaling = mysqli_query($connect, $query);
                                return $filter_Results_scaling;
                            }
                        ?>
                        <?php while($result = mysqli_fetch_array($search_results_scaling)): ?>
                            <tr>
                                <td style="text-align:center; display:none;"> <?php echo $result['id']; ?> </td>
                                <td style="text-align:center"><a href="view_appointment.php?view=<?php echo $result['id']; ?>"><?php echo $result['matric_no']; ?></a></td>
                                <td style="text-align:center"> <?php echo $result['stud_name']; ?> </td>
                                <td style="text-align:center"> <?php echo $result['semester']; ?> </td>
                                <td style="text-align:center"> <?php echo $result['phone_no']; ?> </td>
                                <td style="text-align:center"> <?php echo $result['appt_date']; ?> </td>
                                <td style="text-align:center"> <?php echo $result['slot']; ?> </td>
                                <td style="text-align:center">
                                    <a class='btn btn-success btn-sm scalingbtn' type='button'>Complete</a>
                                </td>
                            </tr>                            
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Complete Confirmation Message (filling_appt) -->
    <div class="modal fade" id="completemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:blue">Appointment Completed?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="server/update_filling_appt.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">
                        <h5>Are you sure this appointment has completed?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                        <button type="submit" name="deletedata" class="btn btn-primary">Complete</button>
                        <!-- <button type="submit" name="deletedata" class="btn btn-primary" href="server/delete_appt.php?delete=<?php echo $result['id']; ?>">Yes, Cancel it</button> -->
                    </div>
                </form>
            </div>
        </div>  
    </div>
    <!-- Complete Confirmation Message (removing appt) -->
    <div class="modal fade" id="removemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:blue">Appointment Completed?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="server/update_removing_appt.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="remove_id" id="remove_id">
                        <h5>Are you sure this appointment has completed?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                        <button type="submit" name="removedata" class="btn btn-primary">Complete</button>
                        <!-- <button type="submit" name="deletedata" class="btn btn-primary" href="server/delete_appt.php?delete=<?php echo $result['id']; ?>">Yes, Cancel it</button> -->
                    </div>
                </form>
            </div>
        </div>  
    </div>
    <!-- Complete Confirmation Message (scaling appt) -->
    <div class="modal fade" id="scalingmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:blue">Appointment Completed?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="server/update_scaling_appt.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="scaling_id" id="scaling_id">
                        <h5>Are you sure this appointment has completed?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                        <button type="submit" name="scalingdata" class="btn btn-primary">Complete</button>
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

    <!-- filling -->
    <script>
        $(document).ready(function(){
            $('.completebtn').on('click', function(){
                $('#completemodal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#delete_id').val(data[0]);
            });
        });
    </script>

    <!-- removing -->
    <script>
        $(document).ready(function(){
            $('.removebtn').on('click', function(){
                $('#removemodal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#remove_id').val(data[0]);
            });
        });
    </script>

    <!-- scaling -->
    <script>
        $(document).ready(function(){
            $('.scalingbtn').on('click', function(){
                $('#scalingmodal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);
                $('#scaling_id').val(data[0]);
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