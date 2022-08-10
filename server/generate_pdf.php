<?php
    require('libs/tcpdf.php');
    // include_once("dbconnect.php");
    $con = mysqli_connect('localhost', 'root');
    mysqli_select_db($con, 'hep_student');

    $pdf = new TCPDF();
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    $pdf->AddPage();

    $pdf->SetFont('Helvetica','',12);

    if(isset($_GET['view'])){
        $id = $_GET['view'];

        $sql = "SELECT * FROM tbl_appointment WHERE id=$id";
        $query= mysqli_query($con, $sql);
        while ($row=mysqli_fetch_array($query)){
            $pdf->SetTextColor(255,0,0);
            $pdf->Cell(190, 30, "Please print out your appointment slip and bring to the counter on your appointment date", 0, 1);

            $pdf->SetTextColor(0,0,0);

            $pdf->SetFont('Helvetica','B',13);
            $pdf->Cell(190, 10, "Appointment Slip", 0, 1, 'C');
            $pdf->Line(10, 50, 200, 50);

            $pdf->SetFont('Helvetica','',12);
            $pdf->Cell(190, 20, "Your appointment has been scheduled as below:", 0, 1);

            $pdf->Cell(25, 6, "Name", 0, 0);
            $pdf->Cell(88, 6, ": ".$row['stud_name'], 0, 0);
            $pdf->Cell(25, 6, "Date", 0, 0);
            $pdf->Cell(52, 6, ": ".$row['appt_date'], 0, 1);

            $pdf->Cell(25, 6, "Matric No.", 0, 0);
            $pdf->Cell(88, 6, ": ".$row['matric_no'], 0, 0);
            $pdf->Cell(25, 6, "Slot/Time", 0, 0);
            $pdf->Cell(52, 6, ": ".$row['slot'], 0, 1);

            $pdf->Cell(25, 6, "Semester", 0, 0);
            $pdf->Cell(88, 6, ": ".$row['semester'], 0, 0);
            $pdf->Cell(25, 6, "Service", 0, 0);
            $pdf->Cell(52, 6, ": ".$row['service'], 0, 1);

            $pdf->Cell(25, 6, "Phone No.", 0, 0);
            $pdf->Cell(88, 6, ": ".$row['phone_no'], 0, 0);
            $pdf->Cell(25, 6, "", 0, 0);
            $pdf->Cell(52, 6, "", 0, 1);

            $pdf->Cell(25, 6, "", 0, 0);
            $pdf->Cell(88, 6, "", 0, 0);
            $pdf->Cell(25, 6, "", 0, 0);
            $pdf->Cell(52, 6, "", 0, 1);

            $pdf->Cell(25, 6, "", 0, 0);
            $pdf->Cell(88, 6, "", 0, 0);
            $pdf->Cell(25, 6, "", 0, 0);
            $pdf->Cell(52, 6, "", 0, 1);

            $pdf->Cell(190, 6, "Thank You", 0, 1, 'C');
            $pdf->Cell(190, 6, "We'll serve you soon!", 0, 1, 'C');

            $pdf->Cell(190, 6, "", 0, 1, 'C');
            $pdf->Line(10, 123, 200, 123);

            $pdf->SetFont('Helvetica','B',10);
            $pdf->Cell(10, 10, "Note:", 0, 0);
            $pdf->SetFont('Helvetica','',10);
            $pdf->Cell(100, 10, "For any changes, please update a day before your appointment date.", 0, 0);
        }
    }

    // $pdf->Cell(25, 6, "Note:", 1, 1);
    // $pdf->Cell(88, 6, "For any changes, please update a day before your appointment date.", 1, 1);

    // $pdf->Cell(55, 5, "Amount", 0, 0);
    // $pdf->Cell(58, 5, ": RM3456.90", 0, 0);
    // $pdf->Cell(25, 5, "Channel", 0, 0);
    // $pdf->Cell(52, 5, ": WEB", 0, 1);

    // $pdf->Cell(55, 5, "Status", 0, 0);
    // $pdf->Cell(58, 5, ": Complete", 0, 1);

    // blank space
    // $pdf->Cell(55, 5, "", 0, 0); 
    // $pdf->Cell(58, 5, "", 0, 0);
    // $pdf->Cell(25, 5, "", 0, 0);
    // $pdf->Cell(52, 5, "", 0, 1);

    // $pdf->Line(10, 35, 200, 35);

    // $pdf->Ln(10);
    // $pdf->Cell(55, 5, "Product ID", 0, 0);
    // $pdf->Cell(58, 5, ": 5Y5TA1", 0, 1);

    // $pdf->Cell(55, 5, "Tax Amount", 0, 0);
    // $pdf->Cell(58, 5, ": 0", 0, 1);

    // $pdf->Cell(55, 5, "Product Service Charge", 0, 0);
    // $pdf->Cell(58, 5, ": 0", 0, 1);

    // $pdf->Cell(55, 5, "Product Delivery Charge", 0, 0);
    // $pdf->Cell(58, 5, ": 0", 0, 1);

    // $pdf->Line(10, 80, 200, 80);

    // $pdf->Ln(10);
    // $pdf->Cell(55, 5, "Paid by", 0, 0);
    // $pdf->Cell(58, 5, ": Syafiza Surani", 0, 1);

    // $pdf->Line(155, 75, 195, 75);

    // $pdf->Ln(5);
    // $pdf->Cell(140, 5, "", 0, 0);
    // $pdf->Cell(50, 5, ": Signature", 0, 1, 'C');
    $pdf->Output();
?>