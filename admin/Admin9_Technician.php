<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician</title>
    <link rel="stylesheet" href="Admin9_Technician.css">
</head>
<body>
    <?php
        include_once("Admin0_Navigator.php");
        include("admin_conn.php");
    ?>

    <form  action="Admin9_Technician.php" method="post">
        <div class="techniciansearch"> Searching Technician:  
            <button type="submit" id="searchteck"><i class='bx bx-search-alt-2' id="techniciansearchicon" ></i></button>
            <input type="text" placeholder="Search for" id="searchingedit" name="searchtechnicianbar">
        </div>
    </form>


    <div class="techniciantitlecontainer">
        <span>ID</span>
        <span>Profile-Picture</span>
        <span>Name</span>
        <span>Contact</span>
        <span>Status</span>
        <span>Actions</span>
    </div>

    <div class="technicianbackground">
        <?php

            if (isset($_POST["searchtechnicianbar"]) == True){
                $name = $_POST["searchtechnicianbar"];
            }
            else{
                $name = null;
            }
        
        if (isset($name) == True){
            $sql = "SELECT * FROM technicians WHERE tech_verify = 1 AND tech_ID LIKE '%$name%' OR tech_firstname LIKE '%$name%' or tech_lastname LIKE '%$name%';";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo'
                <div class="techniciancontainer">
                    <span id="technicianid">'.$row["tech_ID"].'</span>
                    <img src="data:image;base64,'.$row["tech_profilepic"].'" id="technicianprofilepic">
                    <span id="technicianname">'.$row["tech_firstname"].' '.$row["tech_lastname"].'</span>
                    <span id="techniciancontact">'.$row["tech_mobilenum"].'</span>
                    <span id="technicianemail">'.$row["tech_email"].'</span>
                    <span id="technicianstatus">Verified<i class="bx bxs-check-circle" id="technicianstatuscolor"></i></span>
                    <a onclick="return confirm(\'Edit this record?\')" href="Admin9technicianprofile.php?id='.$row["tech_ID"].'" target="_blank"><span id="profile"><i class="bx bx-user"></i></span></a>
                    <a onclick="return confirm(\'Delete this record?\')" href="Admin9techniciandelete.php?id='.$row["tech_ID"].'"><span id="delete"><i class="bx bx-trash"></i></span></a>
                </div>';
            }
        }
        else {
            $sql = "SELECT * FROM technicians WHERE tech_verify = 1;";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo'
                <div class="techniciancontainer">
                    <span id="technicianid">'.$row["tech_ID"].'</span>
                    <img src="data:image;base64,'.$row["tech_profilepic"].'" id="technicianprofilepic">
                    <span id="technicianname">'.$row["tech_firstname"].' '.$row["tech_lastname"].'</span>
                    <span id="techniciancontact">'.$row["tech_mobilenum"].'</span>
                    <span id="technicianemail">'.$row["tech_email"].'</span>
                    <span id="technicianstatus">Verified<i class="bx bxs-check-circle" id="technicianstatuscolor"></i></span>
                    <a onclick="return confirm(\'Edit this record?\')" href="Admin9technicianprofile.php?id='.$row["tech_ID"].'" target="_blank"><span id="profile"><i class="bx bx-user"></i></span></a>
                    <a onclick="return confirm(\'Delete this record?\')" href="Admin9techniciandelete.php?id='.$row["tech_ID"].'"><span id="delete"><i class="bx bx-trash"></i></span></a>
                </div>';
            }
        }
        ?>

    </div>


    <div id="verifytechpage">
        <p class="verifytechtopic"> Verify Technician </p>
        <i class='bx bx-x-circle'id="crossverifytech" onclick=closetechverify()></i>
    
        <?php
            $sql = "SELECT * FROM technicians WHERE tech_verify = 0;";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo '
                    <div id="verifybox1">
                        <img src="data:image;base64,'.$row["tech_profilepic"].'" id="verifytechpic">
                        <span id="verifytechid"> Tech ID: '.$row["tech_ID"].' </span>
                        <span id="verifytechname">'. $row["tech_firstname"].' '.$row["tech_lastname"].'</span>
                        <a href="Admin9technicianverify.php?id='.$row["tech_ID"].'" target="_blank"><div id="verifytechbutton">Verify</div></a>
                    </div>';
            }
        ?>

    </div>
    
    <div class="verifytech" onclick=opentechverify()><span id="verifytech">Verify Technician</span></div>

    <script src="Admin9_Technician.js"></script>
</body>
</html>