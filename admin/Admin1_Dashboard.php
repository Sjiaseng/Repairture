<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="Admin1_Dashboard.css">
</head>
<body>
    <?php
        $page = "dashboard";
        include_once("Admin0_Navigator.php");
        include("admin_conn.php");

        $appointment = mysqli_query($con, "SELECT * FROM booking WHERE  booking_status='Complete';");
        $appointmentcount = mysqli_num_rows($appointment);

        $user = mysqli_query($con, "SELECT * FROM users WHERE  user_verify=1;");
        $usercount = mysqli_num_rows($user);

        $admin = mysqli_query($con, "SELECT * FROM admins;");
        $admincount = mysqli_num_rows($admin);

        $technician = mysqli_query($con, "SELECT * FROM technicians WHERE tech_verify=1;");
        $techniciancount = mysqli_num_rows($technician);
    ?>

    <div id="status">
        <div id="statuscontent"><b>Status:&nbsp;<span id="statusdot"></span></b>
            <select id="selectstatus">
                <option value="Online">Online</option>
            </select>
        </div>
    </div>

    <div id="dashboardreport">
        <div id="appointmentongoing"> <span id="logo2"><img src="admin_image/dashboardlogo2" class="dashboardlogo1"></span><span class="topic">Appointments <br> Completed</span><span class="innercontent3"><?php echo $appointmentcount ?> Appointments <br> were completed!</span></div>
        <div id="totaluser"><span id="logo1"><img src="admin_image/dashboardlogo1.png" class="dashboardlogo2"></span><span class="topic">Total Verified <br> Users</span><span class="innercontent1"><?php echo $usercount ?> Users are Verified!</span></div>
        <div id="totalappointmentlisted"><span id="logo3"><img src="admin_image/dashboardlogo3" class="dashboardlogo3"></span><span class="topic">Total System <br> Admins</span><span class="innercontent2"><?php echo $admincount ?> Admins are Registered!</span></div>
        <div id="totaltechnician"><span id="logo4"><img src="admin_image/dashboardlogo4.png" class="dashboardlogo4"></span><span class="topic">Total Verified <br> Technician</span><span class="innercontent1"><?php echo $techniciancount ?> Technicians are Verified!</span></div>
    </div>

    <?php

        // calculation on graph percentage
        
        $pendingappointment = mysqli_query($con, "SELECT * FROM booking WHERE  booking_status='Pending';");
        $totalpendingappointmentcount = mysqli_num_rows($pendingappointment);

        $comingappointment = mysqli_query($con, "SELECT * FROM booking WHERE  booking_status='ComingSoon';");
        $totalcomingappointmentcount = mysqli_num_rows($comingappointment);

        $cancelappointment = mysqli_query($con, "SELECT * FROM booking WHERE  booking_status='Cancel';");
        $totalcancelappointmentcount = mysqli_num_rows($cancelappointment);

        $completeappointment = mysqli_query($con, "SELECT * FROM booking WHERE  booking_status='Complete';");
        $totalcompleteappointmentcount = mysqli_num_rows($cancelappointment);

        $allappointment = mysqli_query($con, "SELECT * FROM booking;");
        $totalallappointment = mysqli_num_rows($allappointment);
        
        $pending = ($totalpendingappointmentcount / $totalallappointment)*100;


        $coming = ($totalcomingappointmentcount / $totalallappointment)*100;
    

        $cancel = ($totalcancelappointmentcount / $totalallappointment)*100;
      

        $complete = ($totalcompleteappointmentcount / $totalallappointment)*100;
       

    ?>



    <div class="graph">
        <span id="graphtopic">Today's Appointment</span>
        <ul id="graphkeys">
            <li><span id="keycolor1"></span>Pending </li> <br>
            <li><span id="keycolor2"></span>Coming-Soon </li> <br>
            <li><span id="keycolor3"></span>Cancelled </li> <br>
            <li><span id="keycolor4"></span>Completed </li>
        </ul>
        <div id="chart" style="background: conic-gradient(#fdae51 0% <?php echo $pending, "%";?> , #4c82f7 <?php echo $pending, "%";?> <?php echo $pending+$coming,"%";?> 
        , #f65d5d <?php echo $pending+$coming,"%";?> <?php echo $pending+$coming+$cancel,"%";?> , #8bff44 <?php echo $pending+$coming+$cancel,"%";?> <?php echo $pending+$complete+$coming+$cancel,"%";?>);"></div>
        <div id="middlecircle"></div>
    </div>

    <div class="wrapper">
        <span class="calendar-topic">Calendar</span>
        <header>
            <div class="innerwrapper">
                <p class="current-date"></p>
                <div class="calendar-icon">
                    <span id="prev" class="arrow-left"><i class='bx bx-chevron-left' id="prev"></i></span>
                    <span id="next" class="arrow-right"><i class='bx bx-chevron-right' id="next" ></i></span>
                </div>
            </div>
            <div class="calendar">
                <ul class="week-day">
                    <li>Su</li>
                    <li>Mo</li>
                    <li>Tu</li>
                    <li>We</li>
                    <li>Th</li>
                    <li>Fr</li>
                    <li>Sa</li>
                </ul>
                <ul class="calendar-days">
                </ul>
            </div>
        </header>
    </div>

    <div class="dashboardtodobg">
        <div class="dashboardtodoheader">
            <span>To-Do Lists</span>
        </div>

        
            <?php 
                $adminID = $_SESSION['admin_id'];
                $result = mysqli_query($con, "SELECT * FROM todolist WHERE todo_starred = 'True' AND admin_ID='$adminID';");
                while ($row = mysqli_fetch_array($result)){
                echo'
                    <div class="dashboardtodolist">
                    <span class="dashboardtodosubject">
                        '.$row["todo_subject"].'
                    </span>
                    <span class="dashboardtododate">'.$row["todo_date"].'</span>
                    <span id="todostardashboard"><i class="bx bxs-star" id="dashboardtodostar" ></i></span>
                    </div>';
                }
        ?>
       
    </div>
    


    
    
    <script src="Admin1_Dashboard.js"></script>
</body>
</html>