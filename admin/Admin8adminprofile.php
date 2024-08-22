<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing Admin Profile</title>
</head>
<body>
    <?php
        include("admin_conn.php");
        $id = intval($_GET['id']);

        $result = mysqli_query($con,"SELECT * FROM admins WHERE admin_ID = $id;");
        
        while ($row = mysqli_fetch_array($result))
            {

    ?>

    <form action="Admin8profileupdate.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="editingid" value="<?php echo $row["admin_ID"]; ?>">
        <div class="editadminform">
            
            <img src="http://localhost/repairture/admin/admin_image/logo.png" id="editlogo2">
            <p id="edittopic2">Editing Admin Profile</p>

            <label> Admin ID: &nbsp; </label>
            <input type="text" readonly name="admin_ID" value=<?php echo $row["admin_ID"]?>> <br> <br>
            <label> Admin Email: &nbsp; </label>
            <input type="email" name="admin_email" required value=<?php echo $row["admin_email"]?>> <br> <br>
            <label> Admin Password: &nbsp; </label>
            <input type="password" name="admin_passwrd" required value=<?php echo $row["admin_passwrd"]?>> <br> <br>

            <label> Admin Firstname: &nbsp;</label>
            <input type="text" name="admin_firstname" required value=<?php echo $row["admin_firstname"]?>> <br> <br>
            <label> Admin Lastname: &nbsp;</label>
            <input type="text" name="admin_lastname" required value=<?php echo $row["admin_lastname"]?>> <br> <br>
            <label> Admin Mobile: &nbsp; </label>
            <input type="text" name="admin_mobilenum" required min="10" max="11" value=<?php echo $row["admin_mobilenum"]?>> <br><br>

            <img src="data:image;base64, <?php echo $row['admin_profilepic']?>"id="myadminpicture">

            <input type="submit" value="Save Changes" id="submiteditadmin"> <br><br>
        </div>

    </form>

    <?php
        };
        mysqli_close($con);
    ?>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
        body{
            background:#eaeef1;
        }

        .editadminform{
            position: absolute;
            border:1px solid;
            width:500px;
            height:750px;
            overflow-y: scroll;
            background: white;
            border-radius: 25px;
            border-color: #888;
            left:525px;
            top:10px;
        }

        .editadminform::-webkit-scrollbar{
            width:0;
        }

        label, input{
            position: relative;
            left:50px;
            top:250px;
            margin-top: 20px;
        }

        #editlogo2{
            width:200px;
            position: absolute;
            top:15px;
            left:150px;
        }

        #edittopic2{
            position: absolute;
            font-size: 20px;
            left:155px;
            top:65px;
            color:#4a4edb;
            text-decoration: underline;
            font-weight: bold;
        }

        #myadminpicture{
            position: absolute;
            width:100px;
            height: 100px;
            top:135px;
            left:200px;
            border: 1px solid;
            background: grey;
            border-color: grey;
            border-radius: 50%;
        }
        
        #submiteditadmin{
            position: absolute;
            border-color: transparent;
            background: #4a4edb;
            color:white;
            font-weight: bold;
            font-family: 'Poppins';
            font-size: 15px;
            border-radius: 10px;
            top:680px;
            left:340px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        ::-webkit-scrollbar{
            width: 0;
        }
    </style>
</body>
</html>