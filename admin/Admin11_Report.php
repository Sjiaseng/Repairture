<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="mytitle">Admin Report</title>
    <link rel="stylesheet" href="Admin11_Report.css">
</head>
<body>
    <?php
        include_once("Admin0_Navigator.php");
    ?>

    <form action="Admin11_Report.php" method="post">
        <div id="datereport">

            From &nbsp;
            <input type="date" name="sourcedate"> &nbsp;
            
            To &nbsp;
            <input type="date" name="destinationdate"> &nbsp;

            <input type="submit" value="Search" id="reportbutton">

        </div>
    </form>

    <div id="printbutton" onclick=printnow()><i class='bx bx-printer' id="printicon"></i></div>

    
    <div id="reportbox">
        <div id="reportheader">
            <span class="content1">Booking <br> ID</span>
            <span class="content2">User</span>
            <span class="content3">Technician</span>
            <span class="content4">Booking <br>  Date</span>
            <span class="content5">Service <br> Name</span>
            <span class="content6">Created <br> Date</span>
            <span class="content7">U.C.N</span>
            <span class="content8">T.C.N </span>
            <span class="content9">Status</span>
        </div>

    <?php
        if (isset($_POST["sourcedate"])){
            $date1=$_POST["sourcedate"];
        }
        else{
            $date1=null;
        }

        if (isset($_POST["destinationdate"])){
            $date2=$_POST["destinationdate"];
        }
        else{
            $date2=null;
        }

        $result1 = mysqli_query($con,"SELECT booking.booking_status, booking.booking_ID, booking.created_at, booking.services_name, users.user_firstname, users.user_lastname, 
        booking.booking_date_time,technicians.tech_firstname, technicians.tech_lastname, booking.booking_status, booking.user_cancel_note,booking.tech_cancel_note FROM booking 
        JOIN users ON users.user_ID = booking.user_ID JOIN technicians ON technicians.tech_ID = booking.tech_ID ORDER BY booking.created_at ASC, booking.booking_ID ASC;");

        $result2 = mysqli_query($con,"SELECT booking.booking_status, booking.booking_ID, booking.created_at, booking.services_name, users.user_firstname, users.user_lastname, 
        booking.booking_date_time,technicians.tech_firstname, technicians.tech_lastname, booking.booking_status, booking.user_cancel_note,booking.tech_cancel_note FROM booking 
        JOIN users ON users.user_ID = booking.user_ID JOIN technicians ON technicians.tech_ID = booking.tech_ID
        WHERE booking.created_at BETWEEN '$date1' AND '$date2' ORDER BY booking.created_at ASC, booking.booking_ID ASC;");


        if( $date1 != null && $date2 != null){
            while ($row = mysqli_fetch_array($result2)) {
                echo'
                <div class="reportcontent">
                    <span id="report1">'.$row["booking_ID"].'</span>
                    <span id="report2">'.$row["user_firstname"].' '.$row["user_lastname"].'</span>
                    <span id="report3">'.$row["tech_firstname"].' '.$row["tech_lastname"].'</span>
                    <span id="report4">'.$row["booking_date_time"].'</span>
                    <span id="report5">'.$row["services_name"].'</span>
                    <span id="report6">'.$row["created_at"].'</span>
                    <span id="report7">'.$row["user_cancel_note"].'</span>
                    <span id="report8">'.$row["tech_cancel_note"].'</span>
                    <span id="report9">'.$row["booking_status"].'</span>
                </div>';
        }
    }

    else{
        while ($row = mysqli_fetch_array($result1)) {
            echo'
            <div class="reportcontent">
                <span id="report1">'.$row["booking_ID"].'</span>
                <span id="report2">'.$row["user_firstname"].' '.$row["user_lastname"].'</span>
                <span id="report3">'.$row["tech_firstname"].' '.$row["tech_lastname"].'</span>
                <span id="report4">'.$row["booking_date_time"].'</span>
                <span id="report5">'.$row["services_name"].'</span>
                <span id="report6">'.$row["created_at"].'</span>
                <span id="report7">'.$row["user_cancel_note"].'</span>
                <span id="report8">'.$row["tech_cancel_note"].'</span>
                <span id="report9">'.$row["booking_status"].'</span>
            </div>';
        }
    }
    ?>

    </div>

    <script src="Admin11_Report.js"></script>

</body>
</html>