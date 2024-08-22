<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="Admin8_Admin.css">
</head>
<body>
    <?php
        include_once("Admin0_Navigator.php");
        include("admin_conn.php");
    ?>

    <form action="Admin8_Admin.php" method="post">
        <div class="adminsearch"> Searching Admin:  
            <button type="submit" id="submitsearchadmin"><i class='bx bx-search-alt-2' id="adminsearchicon" ></i></button>
            <input type="text" placeholder="Search for" id="searchingedit" name="searchadmin">
        </div>
    </form>


    <div class="admintitlecontainer">
        <span>ID</span>
        <span>Profile-Picture</span>
        <span>Name</span>
        <span>Contact</span>
        <span>Status</span>
        <span>Actions</span>
    </div>

    <div class="adminbackground">

    <?php
 

        if (isset($_POST["searchadmin"]) == True){
            $name = $_POST["searchadmin"];
        }
        else{
            $name = null;
        }


        if(isset($name)==True){
            $sql = "SELECT * FROM admins WHERE admin_ID LIKE '$name' OR admin_firstname LIKE '%$name%' OR admin_lastname LIKE '%$name%';";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
                
                echo'
                <div class="admincontainer">
                <span id="adminid">'.$row["admin_ID"].'</span>
                <img src="data:image;base64,'.$row["admin_profilepic"].'" id="adminprofilepic">
                <span id="adminname">'.$row["admin_firstname"].' '.$row["admin_lastname"].'</span>
                <span id="admincontact">'.$row["admin_mobilenum"].'</span>
                <span id="adminemail">'.$row["admin_email"].'</span>
                <span id="adminstatus">Verified<i class="bx bxs-check-circle" id="adminstatuscolor"></i></span>
                <a onclick="return confirm(\'Edit this record?\')" href="Admin8adminprofile.php?id='.$row["admin_ID"].'" target="_blank"><span id="profile"><i class="bx bx-user"></i></span>
                <a onclick="return confirm(\'Delete this record?\')" href="Admin8admindelete.php?id='.$row["admin_ID"].'"><span id="delete"><i class="bx bx-trash"></i></span></a>
                </div>';
            }
        }
        else{
            $sql = "SELECT * FROM admins";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
                
                echo'
                <div class="admincontainer">
                <span id="adminid">'.$row["admin_ID"].'</span>
                <img src="data:image;base64,'.$row["admin_profilepic"].'" id="adminprofilepic">
                <span id="adminname">'.$row["admin_firstname"].' '.$row["admin_lastname"].'</span>
                <span id="admincontact">'.$row["admin_mobilenum"].'</span>
                <span id="adminemail">'.$row["admin_email"].'</span>
                <span id="adminstatus">Verified<i class="bx bxs-check-circle" id="adminstatuscolor"></i></span>
                <a onclick="return confirm(\'Edit this record?\')" href="Admin8adminprofile.php?id='.$row["admin_ID"].'" target="_blank"><span id="profile"><i class="bx bx-user"></i></span>
                <a onclick="return confirm(\'Delete this record?\')" href="Admin8admindelete.php?id='.$row["admin_ID"].'"><span id="delete"><i class="bx bx-trash"></i></span></a>
                </div>';
            }
        }
    ?>

    </div>

    <div class="addadmin" onclick=registeradmin()><span id="addadmin">Add New Admin</span></div>

    <form action="Admin8_Admin.php" method="POST" id="registeradmin" enctype="multipart/form-data">

        <i class='bx bx-x-circle'id="crossadmin" onclick=closeadmin()></i>

        <p id="admintopicform"> Register Admin </p>

        <label class="adminformcontent">Email:</label> <br>
        <input type="email" name="admin_email" required class="adminformcontent2"  placeholder="example@gmail.com"> <br>
        
        <label class="adminformcontent">Password:</label> <br>
        <input type="password" name="admin_password" required class="adminformcontent2"  placeholder="Length: Min 6 Max 20" minlength="6" maxlength="20" id="adminpass"> <br>
        
        <label class="adminformcontent">First Name:</label> <br>
        <input type="text" name="admin_firstname" required class="adminformcontent2" placeholder="First Name"> <br>
        
        <label class="adminformcontent">Last Name:</label> <br>
        <input type="text" name="admin_lastname" required class="adminformcontent2" placeholder="Last Name"> <br>
        
        <label class="adminformcontent">Mobile Num:</label> <br>
        <input type="tel" name="admin_phone" required class="adminformcontent2" placeholder="01234567890" minlength="10" maxlength="11" > <br>
        
        <label class="adminformcontent">Profile Picture:</label> <br>
        <input type="file" name="admin_profile" required id="fileuploadadmin"> <br>

        <input type="submit" value="Register" id="adminregisterbutton" name="submitadminregister">
    </form>

    <?php
        if (isset($_POST["submitadminregister"])) {

            $image = $_FILES['admin_profile']['tmp_name'];
            $name = $_FILES['admin_profile']['name'];
            $image = base64_encode(file_get_contents(addslashes($image)));

            $sql = "INSERT INTO admins(admin_email,admin_passwrd,admin_firstname,admin_lastname,admin_mobilenum,admin_profilepic)
                  VALUES
                  ('$_POST[admin_email]','$_POST[admin_password]','$_POST[admin_firstname]','$_POST[admin_lastname]','$_POST[admin_phone]','$image')";
            if (!mysqli_query($con, $sql)) {
                echo '<script>alert("Sorry, there was an error uploading your picture. Please ensure your uploading a Picture!");</script>';
            } else {
                echo '<script>alert("This account has been added into the database!");</script>';
            }
        }
    ?>


    <script src="Admin8_Admin.js"></script>
</body>
</html>
