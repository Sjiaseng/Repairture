<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <link rel="stylesheet" href="Admin4_Appointment.css">
</head>
<body>
    <?php
        include_once("Admin0_Navigator.php");
        include("admin_conn.php");
    ?>

    <form action="Admin4_appointment.php" method="POST">
        <div class="searches">
            <span id="searchassignment">Search By Appointment ID and Name: </span>
            <input type="text" name="searchingappointment" id="inputsearching" placeholder="Enter Searching Keyword">
            <button type="submit" id="assignmentsearch2"><i class='bx bx-search'></i></button>
        </div>
    </form>


    <div class="searchresultpage">
    
    <?php

        if (isset($_POST["searchingappointment"]) == True){
            $name = $_POST["searchingappointment"];
        }
        else{
            $name = null;
        }
    
        $result = mysqli_query($con,"SELECT booking.booking_status, booking.booking_ID, booking.created_at, booking.services_name, users.user_firstname, users.user_lastname, 
        booking.booking_date_time, users.user_mobilenum, users.user_email, technicians.tech_firstname, technicians.tech_lastname, 
        technicians.tech_mobilenum, technicians.tech_email FROM booking JOIN users ON users.user_ID = booking.user_ID JOIN technicians ON
        technicians.tech_ID = booking.tech_ID WHERE booking_ID LIKE '$name' OR user_firstname LIKE '%$name%' OR user_lastname LIKE '%$name%' OR tech_firstname LIKE '%$name%' OR tech_lastname LIKE '%$name%' ORDER BY booking_ID DESC;");

        $count = mysqli_num_rows($result);

        if($count > 0 ){
            while ($row = mysqli_fetch_array($result)){
                if ($row["booking_status"]=="Cancel"){
                    echo'<div class="appointmentstatussection">
                    <div class="appointmentstatusbarcancel"></div>
                    <span class=appointmentid>Appointment ID: '. $row["booking_ID"]. '</span>
                    <span class="appointmentdate">Created At: '. $row["created_at"] .'</span>
                    <span class="appointmentstatustopic">'. $row["services_name"] .'</span>
                    <span class="appointmentstatusdetails">
                        From: '. $row["user_firstname"] .' '. $row["user_lastname"] .'<br>
                        Appointment Date & Time: '. $row["booking_date_time"] .'<br>
                        Phone: '. $row["user_mobilenum"] .'<br>
                        Email: '. $row["user_email"] .' 
                    </span>
                    <div class="appointmentstatusicons">
                        <a onclick="return confirm(\'Edit this record?\')" href="Admin7editappointment.php?id='.$row["booking_ID"].'" target="_blank"> <span id="editstatus"><i class="bx bx-edit" id="editstatusicon"></i>Edit</span></a>
                        <a onclick="return confirm(\'Delete this record?\')" href="Admin7deleteappointment.php?id='.$row["booking_ID"].'"><span id="editdelete"><i class="bx bx-trash" id="editdeleteicon"></i>Delete</span></a>
                    </div>
                    <span class="appointmentstatusdetails2">
                        By: '. $row["tech_firstname"] .' '. $row["tech_lastname"] .'<br> <br>
                        Phone: '. $row["tech_mobilenum"] .'<br>
                        Email: '. $row["tech_email"] .' 
                    </span>
                    </div>';
                }
                else if ($row["booking_status"] == "Pending"){

                    echo'<div class="appointmentstatussection">
                        <div class="appointmentstatusbar"></div>
                        <span class=appointmentid>Appointment ID: '. $row["booking_ID"]. '</span>
                        <span class="appointmentdate">Created At: '. $row["created_at"] .'</span>
                        <span class="appointmentstatustopic">'. $row["services_name"] .'</span>
                        <span class="appointmentstatusdetails">
                            From: '. $row["user_firstname"] .' '. $row["user_lastname"] .'<br>
                            Appointment Date & Time: '. $row["booking_date_time"] .'<br>
                            Phone: '. $row["user_mobilenum"] .'<br>
                            Email: '. $row["user_email"] .' 
                        </span>
                        <div class="appointmentstatusicons">
                            <a onclick="return confirm(\'Edit this record?\')" href="Admin6editappointment.php?id='.$row["booking_ID"].'" target="_blank"> <span id="editstatus"><i class="bx bx-edit" id="editstatusicon"></i>Edit</span></a>
                            <a onclick="return confirm(\'Delete this record?\')" href="Admin6deleteappointment.php?id='.$row["booking_ID"].'"><span id="editdelete"><i class="bx bx-trash" id="editdeleteicon"></i>Delete</span></a>
                        </div>
                        <span class="appointmentstatusdetails2">
                            By: '. $row["tech_firstname"] .' '. $row["tech_lastname"] .'<br> <br>
                            Phone: '. $row["tech_mobilenum"] .'<br>
                            Email: '. $row["tech_email"] .' 
                            </span>
                        </div>';
                }
                else if ($row["booking_status"] == "ComingSoon"){

                    echo'<div class="appointmentstatussection">
                        <div class="appointmentstatusbar1"></div>
                        <span class=appointmentid>Appointment ID: '. $row["booking_ID"]. '</span>
                        <span class="appointmentdate">Created At: '. $row["created_at"] .'</span>
                        <span class="appointmentstatustopic">'. $row["services_name"] .'</span>
                        <span class="appointmentstatusdetails">
                            From: '. $row["user_firstname"] .' '. $row["user_lastname"] .'<br>
                            Appointment Date & Time: '. $row["booking_date_time"] .'<br>
                            Phone: '. $row["user_mobilenum"] .'<br>
                            Email: '. $row["user_email"] .' 
                        </span>
                        <div class="appointmentstatusicons">
                            <a onclick="return confirm(\'Edit this record?\')" href="Admin6editappointment.php?id='.$row["booking_ID"].'" target="_blank"> <span id="editstatus"><i class="bx bx-edit" id="editstatusicon"></i>Edit</span></a>
                            <a onclick="return confirm(\'Delete this record?\')" href="Admin6deleteappointment.php?id='.$row["booking_ID"].'"><span id="editdelete"><i class="bx bx-trash" id="editdeleteicon"></i>Delete</span></a>
                        </div>
                        <span class="appointmentstatusdetails2">
                            By: '. $row["tech_firstname"] .' '. $row["tech_lastname"] .'<br> <br>
                            Phone: '. $row["tech_mobilenum"] .'<br>
                            Email: '. $row["tech_email"] .' 
                        </span>
                    </div>';
                }
                else if ($row["booking_status"] == "Complete"){
                    echo'<div class="appointmentstatussection">
                    <div class="appointmentstatusbar2"></div>
                    <span class=appointmentid>Appointment ID: '. $row["booking_ID"]. '</span>
                    <span class="appointmentdate">Created At: '. $row["created_at"] .'</span>
                    <span class="appointmentstatustopic">'. $row["services_name"] .'</span>
                    <span class="appointmentstatusdetails">
                        From: '. $row["user_firstname"] .' '. $row["user_lastname"] .'<br>
                        Appointment Date & Time: '. $row["booking_date_time"] .'<br>
                        Phone: '. $row["user_mobilenum"] .'<br>
                        Email: '. $row["user_email"] .' 
                    </span>
                        <div class="appointmentstatusicons">
                            <a onclick="return confirm(\'Edit this record?\')" href="Admin6editappointment.php?id='.$row["booking_ID"].'" target="_blank"> <span id="editstatus"><i class="bx bx-edit" id="editstatusicon"></i>Edit</span></a>
                            <a onclick="return confirm(\'Delete this record?\')" href="Admin6deleteappointment.php?id='.$row["booking_ID"].'"><span id="editdelete"><i class="bx bx-trash" id="editdeleteicon"></i>Delete</span></a>
                        </div>
                        <span class="appointmentstatusdetails2">
                            By: '. $row["tech_firstname"] .' '. $row["tech_lastname"] .'<br> <br>
                            Phone: '. $row["tech_mobilenum"] .'<br>
                            Email: '. $row["tech_email"] .' 
                        </span>
                    </div>';
                }
            }
        }
        else{
            echo '<span class="noresultfound"> No results! Please Retry with other Searching Keywords!</span>';
        }

    ?>

    </div>

    <?php echo '<span class="resultfound">'.$count.' Results Found!</span>';?>

    <a href="Admin4_Appointment.php"><div class="refreshbutton">Refresh</div></a>

    <script src="Admin4_Appointment.js">

    </script>
</body>
</html>