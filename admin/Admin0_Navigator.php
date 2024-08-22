<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigator</title>
    <link rel="stylesheet" href="Admin0_Navigator.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body id="body">
    <div>
        <?php 
            $page = basename($_SERVER['PHP_SELF']);
            include("admin_conn.php");
            include("session.php");
            include("admin_profile.php");
            include_once("admin_loading.php"); 
        ?>
    </div>
    <nav class="navigator" id="connection" onscroll="arrow()">
        <div class="logo">
            <img src="http://localhost/repairture/admin/admin_image/logo.png" id="logo">
        </div>

        <div id="arrow_sticker"><img src= "http://localhost/repairture/admin/admin_image/scroll.png" id="sticker"><br>Scroll Down!</div>

        <div><i class='bx bxs-chevron-down' id="dropdown" title="Double click for detailed lists." onclick="dropdown()"></i></div>

        <span id="adminpanel">Admin Panel</span>
        <div class="directory1">
            <ul>
                <a href="Admin1_Dashboard.php">
                    <li class="<?php if ( $page == "Admin1_Dashboard.php" ): echo "active"; else: echo "main"; endif; ?>"><span id="text"><i class='bx bx-home-alt-2' ></i>Dashboard</span></li>
                </a>

                <a href="Admin2_Inbox.php">
                    <li class="<?php if ( $page == "Admin2_Inbox.php" ): echo "active"; else: echo "main"; endif; ?>"><span id="text"><i class='bx bx-message-square-dots'></i>Inbox</span></li>
                </a>

                <a href="Admin3_To-Do_Lists.php">
                    <li class="<?php if ( $page == "Admin3_To-Do_Lists.php" ): echo "active"; else: echo "main"; endif; ?>"><span id="text"><i class='bx bx-spreadsheet'></i>To-Do List</span></li>
                </a>

                <a href="Admin4_Appointment.php">
                    <li class="<?php if ($page == "Admin4_Appointment.php"): echo "active"; else: echo "main"; endif; ?>" id="appointment"><span id="text"><i class='bx bx-pie-chart-alt' ></i>Appointment</span></li>
                </a>
            </ul>
        </div>

        <div class="innerappointment" id="innerappointment">
            <ul>
                <a href="Admin5_Appointment_List.php">
                    <li class="<?php if ( $page == "Admin5_Appointment_List.php" ): echo "subactive"; else: echo "sub"; endif; ?>"><span id="subtext">Appointment List</span></li>
                </a>

                <a href="Admin6_Appointment_Status.php">
                    <li class="<?php if ( $page == "Admin6_Appointment_Status.php" ): echo "subactive"; else: echo "sub"; endif; ?>"><span id="subtext">Appointment Status</span></li>
                </a>

                <a href="Admin7_Cancelled_Appointment.php">
                    <li class="<?php if ( $page == "Admin7_Cancelled_Appointment.php" ): echo "subactive"; else: echo "sub"; endif; ?>"><span id="subtext">Cancelled Appointment</span></li>
                </a>
            </ul>
        </div>
        <div id="moving">
        <div><i class='bx bxs-chevron-down' id="dropdown2" title="Double click for detailed lists." onclick="dropdown()"></i></div>
        <div class="directory2">
            <ul>
                <a href="Admin8_Admin.php">
                    <li class="<?php if ( $page == "Admin8_Admin.php" ): echo "active"; else: echo "main"; endif; ?>"><span id="text"><i class='bx bx-at'></i>Admin</span></li>
                </a>

                <a href="Admin9_Technician.php">
                    <li class="<?php if ( $page == "Admin9_Technician.php" ): echo "active"; else: echo "main"; endif; ?>"><span id="text"><i class='bx bx-wrench' ></i>Technician</span></li>
                </a>

                <a href="Admin10_User.php">
                    <li class="<?php if ( $page == "Admin10_User.php" ): echo "active"; else: echo "main"; endif; ?>"><span id="text"><i class='bx bx-user' ></i>User</span></li>
                </a>

                <a href="Admin11_Report.php">
                    <li class="<?php if ( $page == "Admin11_Report.php" ): echo "active"; else: echo "main"; endif; ?>"><span id="text"><i class='bx bx-edit' ></i>Report</span></li>
                </a>
            </ul>
        </div>

        <div id="divider"></div>

        <span id="support">Support</span>

        <div class="directory3">
            <ul>
                <a href="Admin12_Settings.php">
                    <li class="<?php if ( $page == "Admin12_Settings.php" ): echo "active"; else: echo "main"; endif; ?>"><span id="text"><i class='bx bx-cog' ></i>Settings</span></li>
                </a>

                <a href="Admin13_FAQ.php">
                    <li class="<?php if ( $page == "Admin13_FAQ.php" ): echo "active"; else: echo "main"; endif; ?>"><span id="text"><i class='bx bx-info-circle'></i>FAQ</span></li>
                </a>

                <a href="Admin14_Customer_Service.php">
                    <li class="<?php if ( $page == "Admin14_Customer_Service.php" ): echo "active"; else: echo "main"; endif; ?>" id="customer"><span id="text"><i class='bx bx-user-voice' ></i>Customer Service</span></li>
                </a>
            </ul>
        </div>

        <div class="innercustomer" id="innercustomer">
            <ul>
                <a href="Admin15_Contact_Us.php">
                    <li class="<?php if ( $page == "Admin15_Contact_Us.php" ): echo "subactive"; else: echo "sub"; endif; ?>"><span id="subtext">Contact Us</span></li>
                </a>
            </ul>
        </div>
        </div>
    </nav>

    <div id="Header">
        <form> <!-- for php usage -->
        <div class="searchbar"><i class='bx bx-search' id="searchicon" ></i><input type="text" id="searchbar" name="search" placeholder="Enter Searching Keyword"></div>
        </form>
        <div class="profile"> <i class='bx bxs-chevron-down' id="arrow_down" onclick="profiledropdown()"></i>
        <span id="divider2"></span>
        <span id="notificationicon" onclick="notificationdropdown()"><i class='bx bx-bell'></i></span> </div>
    </div>

    <span id="closenotification" onclick="closenotification()"><i class='bx bx-x-circle' id="cross2"></i></span>
    
    <div id="UpperDashboard">UpperDashboard</div>
    <div id="LowerDashboard">LowerDashboard</div>

    <div id="profiledropdown" onclick="profiledropdown()">
        <a href="admin_logout.php"><div id="profiledropdown1"><i class='bx bx-exit'></i>Logout</div></a>
    </div>
    <span id="closeprofile" onclick="closeprofile()"><i class='bx bx-x-circle'id="cross"></i></span>

    <?php                        
        date_default_timezone_set("Asia/Kuala_Lumpur");


        $user = mysqli_query($con, "SELECT * FROM users WHERE  user_verify='0';");
        $usercount = mysqli_num_rows($user);

        $tech = mysqli_query($con, "SELECT * FROM technicians WHERE  tech_verify='0';");
        $techcount = mysqli_num_rows($tech);
    ?>

    <div id="profilenotificationdropdown">
        <header id="notify">Notification:</header> 

        <div class="notification-wrapper">
            <div id="thecontenttopic"> Subject: <?php echo $usercount ?> users to be verified! </div>
            <div id="notificationdate"> Date: <?php echo date('d-m-Y H:i:s'); ?> </div>
        </div>

        <div class="notification-wrapper">
            <div id="thecontenttopic"> Subject: <?php echo $techcount ?> users to be verified! </div>
            <div id="notificationdate"> Date: <?php echo date('d-m-Y H:i:s'); ?> </div>
        </div>

    </div>

    <script src="Admin0_Navigator.js"></script>
</body>
</html> 