<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="Admin10_User.css">
</head>
<body>
    <?php
        include_once("Admin0_Navigator.php");
        include("admin_conn.php");
    ?>

    <form action="Admin10_User.php" method="post">
        <div class="usersearch"> Searching User:  
            <button type="submit" id="submitusersearch"><i class='bx bx-search-alt-2' id="usersearchicon" ></i></button>
            <input type="text" placeholder="Search for" id="searchingedit" name="usersearching">
        </div>
    </form>


    <div class="usertitlecontainer">
        <span>ID</span>
        <span>Profile-Picture</span>
        <span>Name</span>
        <span>Contact</span>
        <span>Status</span>
        <span>Actions</span>
    </div>

    <div class="userbackground">
        <?php

            if (isset($_POST["usersearching"]) == True){
                $name = $_POST["usersearching"];
            }
            else{
                $name = null;
            }

            if (isset($name) == True){
                $sql="SELECT * FROM users WHERE user_verify = 1 AND user_ID LIKE '%$name%' OR user_firstname LIKE '%$name%' OR user_lastname LIKE '%$name%';";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo'
                    <div class="usercontainer">
                        <span id="userid">'.$row["user_ID"].'</span>
                        <img src="data:image;base64,'.$row["user_profilepic"].'" id="userprofilepic">
                        <span id="usersname">'.$row["user_firstname"].' '.$row["user_lastname"].'</span>
                        <span id="usercontact">'.$row["user_mobilenum"].'</span>
                        <span id="useremail">'.$row["user_email"].'</span>
                        <span id="userstatus">Verified<i class="bx bxs-check-circle" id="userstatuscolor"></i></span>
                        <a onclick="return confirm(\'Edit this record?\')" href="Admin10userprofile.php?id='.$row["user_ID"].'" target="_blank"><span id="profile"><i class="bx bx-user"></i></span></a>
                        <a onclick="return confirm(\'Delete this record?\')" href="Admin10userdelete.php?id='.$row["user_ID"].'"><span id="delete"><i class="bx bx-trash"></i></span></a>
                    </div>';
                }
            }
            else{
                $sql="SELECT * FROM users WHERE user_verify = 1;";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo'
                    <div class="usercontainer">
                        <span id="userid">'.$row["user_ID"].'</span>
                        <img src="data:image;base64,'.$row["user_profilepic"].'" id="userprofilepic">
                        <span id="usersname">'.$row["user_firstname"].' '.$row["user_lastname"].'</span>
                        <span id="usercontact">'.$row["user_mobilenum"].'</span>
                        <span id="useremail">'.$row["user_email"].'</span>
                        <span id="userstatus">Verified<i class="bx bxs-check-circle" id="userstatuscolor"></i></span>
                        <a onclick="return confirm(\'Edit this record?\')" href="Admin10userprofile.php?id='.$row["user_ID"].'" target="_blank"><span id="profile"><i class="bx bx-user"></i></span></a>
                        <a onclick="return confirm(\'Delete this record?\')" href="Admin10userdelete.php?id='.$row["user_ID"].'"><span id="delete"><i class="bx bx-trash"></i></span></a>
                    </div>';
                }
            }
        ?>
    </div>

    <div id="verifyuserpage">
        <p class="verifyusertopic"> Verify User </p>
        <i class='bx bx-x-circle'id="crossverifyuser" onclick=closeuserverify()></i>
    <?php
        $sql = "SELECT * FROM users WHERE user_verify = 0;";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo'
            <div id="verifybox1">
            <img src="data:image;base64,'.$row["user_profilepic"].'" id="verifyuserpic">
                <span id="verifyuserid"> User ID: '.$row["user_ID"].' </span>
                <span id="verifyusername">'.$row["user_firstname"].' '.$row["user_lastname"].' </span>
                <a href="Admin10userverify.php?id='.$row["user_ID"].'" target="_blank"><div id="verifyuserbutton">Verify</div></a>
            </div>';
        }
    ?>
    </div>

    <div class="verifyuser" onclick=openuserverify()><span id="verifyuser">Verify User</span></div>

    <script src="Admin10_User.js"></script>
</body>
</html>