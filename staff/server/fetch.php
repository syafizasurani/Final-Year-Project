<?php
    sleep(1);
    include("../server/dbconfig.php");
    if(isset($_POST['request'])){
        $request = $_POST['request'];
        $query = "SELECT * FROM filling_appointment WHERE search = '$request'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
?>

<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white" id="table">
    <?php
    if($count){
    ?>
    <thead>
        <th style="text-align:center">Matric No.</th>
        <th style="text-align:center">Student Name</th>
        <th style="text-align:center">Semester</th>
        <th style="text-align:center">Phone No.</th>
        <th style="text-align:center">Date</th>
        <th style="text-align:center">Slot/Time</th>
        <th style="text-align:center">Action</th>
    <?php
    }
    else{
        echo "Sorry, no data record found";
    }
    ?>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
                                    <td style="text-align:center; display:none;"> <?php echo $row['id']; ?> </td>
                                    <td style="text-align:center"><a href="view_appointment.php?view=<?php echo $row['id']; ?>"><?php echo $row['matric_no']; ?></a></td>
                                    <td style="text-align:center"> <?php echo $row['stud_name']; ?> </td>
                                    <td style="text-align:center"> <?php echo $row['semester']; ?> </td>
                                    <td style="text-align:center"> <?php echo $row['phone_no']; ?> </td>
                                    <td style="text-align:center"> <?php echo $row['appt_date']; ?> </td>
                                    <td style="text-align:center"> <?php echo $row['slot']; ?> </td>
                                    <!-- <td style="color: green; text-align:center;"><b>Booked</b></td> -->
                                    <td style="text-align:center">
                                        <a class='btn btn-success btn-sm completebtn' href="server/complete_filling.php?complete=<?php echo $row['id']; ?>">Complete</a>
                                    </td>
                                </tr>    
        <?php
        }
        ?>
    </tbody>
</table>
<?php
    }
?>