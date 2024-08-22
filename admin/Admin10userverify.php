<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing User</title>
</head>
<body>
    <?php
        include("admin_conn.php");
        $id = intval($_GET['id']);

        $result = mysqli_query($con,"SELECT * FROM users WHERE user_ID = $id;");
        
        while ($row = mysqli_fetch_array($result))
            {

    ?>

    <form action="Admin10userverifyupdate.php" method="post" id="usereditform" enctype="multipart/form-data">
        <input type="hidden" name="editinguserid" value="<?php echo $row['user_ID']; ?>">
        <img src="http://localhost/repairture/admin/admin_image/logo.png" id="editlogo3">

        <img src="data:image;base64, <?php echo $row['user_profilepic']?>"id="user_profile">
        <div id="userinfo">

        <label>User ID: </label>
        <input type="text" readonly name="user_ID" value="<?php echo $row["user_ID"]?>"> <br>

        <label>User Email:</label>
        <input type="email" readonly name="user_email" value="<?php echo $row["user_email"]?>"> <br>

        <label>User Password:</label>
        <input type="password" readonly name="user_passwrd" value="<?php echo $row["user_passwrd"]?>"> <br>

        <label>User Firstname:</label>
        <input type="text" readonly name="user_firstname" value="<?php echo $row["user_firstname"]?>"> <br>

        <label>User Lastname:</label>
        <input type="text" readonly name="user_lastname" value="<?php echo $row["user_lastname"]?>"> <br>

        <label>User Age: </label>
        <input type="text" readonly name="user_age" value="<?php echo $row["user_age"]?>"> <br>

        <label>User Gender:</label>
        <select name="usergender">
            <option value="male"  <?php if ($row['user_gender'] == "male") { ?>selected="selected"<?php } ?>>male</option>
            <option value="female" <?php if ($row['user_gender'] == "female") { ?>selected="selected"<?php } ?>>female</option>
        </select> <br>

        <label>User Mobile:</label>
        <input type="text" readonly name="usermobile_num" value="<?php echo $row["user_mobilenum"]?>" > <br>

        <label>User IC Number: </label>
        <input type="text" readonly minlength="12" maxlength="12" name="useric_num" value="<?php echo $row["user_icnum"]?>"> <br>

        <label> Addressline:</label>
        <input type="text" readonly name="user_addressline" value="<?php echo $row["user_addressline"]?>"> <br>

        <label>City:</label>
        <input type="text" readonly name="user_city" value="<?php echo $row["user_city"]?>"> <br>

        <label>State:</label>
        <input type="text" readonly name="user_state" value="<?php echo $row["user_state"]?>"> <br>

        <label>Poscode:</label>
        <input type="text" readonly name="user_poscode" value="<?php echo $row["user_poscode"]?>"> <br>

        </div>

        <label id="user_ic_label"> IC Picture: </label>
        <img src="data:image;base64, <?php echo $row['user_icpic']?>"id="useric">
        
        <label id="verifyingusertopic">This profile is viable</label> 
        <input type="checkbox" value="1" name="verifyinguser" id="verifyinguser" required>
        
        <input type="submit" value="Save Changes" id="submituseredit">
    
    </form>
    <a onclick="return confirm('Delete this user record?')" href="Admin10verifyuserdelete.php?id=<?php echo $id ?>" ><div id="deleteverify">Delete</div>
    <?php
        }
        mysqli_close($con);
    ?>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
        body{
            background-color: #eaeef1;
        }

        #usereditform{
            font-family: 'Poppins';
            font-weight: 0px;
            position: absolute;
            border:1px solid;
            width:600px;
            height:1300px; 
            overflow-y: scroll;
            left:500px;
            border-radius: 50px;
            box-shadow: 0px 30px 40px rgba(0, 0, 0, 0.1);
            background: white;
        }

        #usereditform::-webkit-scrollbar{
            width:0px;
        }

        #user_profile{
            border: 1px solid;
            width:100px;
            height:100px;
            border-radius: 50%;
            background-color: transparent;
            position: absolute;
            top:100px;
            left:250px;
        }

        #editlogo3{
            width:250px;
            position: absolute;
            top:10px;
            left:180px;
        }

        #userinfo{
            position: relative;
            top:225px;
            margin-left: 50px;
            line-height: 50px;
        }

        #useric{
            height:250px;
            width:350px;
            position: absolute;
            top:925px;
            left:50px;
        }

        #user_ic_label{
            position: absolute;
            top:890px;
            left:50px;
        }
        
        #submituseredit{
            position: absolute;
            border-color: transparent;
            background: #4a4edb;
            color:white;
            font-weight: bold;
            font-family: 'Poppins';
            font-size: 15px;
            border-radius: 10px;
            top:1235px;
            left:425px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        #deleteverify{
            position: absolute;
            border: 1px solid;
            width:75px;
            text-align: center;
            color:red;
            border-radius: 10px;
            cursor: pointer;
            top:1245px;
            left:825px;
            font-family: 'Poppins';

        }

        #verifyingusertopic{
            position: absolute;
            top:1235px;
            left:50px;
        }

        #verifyinguser{
            position: absolute;
            top:1238px;
            left:225px;
        }
    </style>


</body>
</html>