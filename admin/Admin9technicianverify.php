<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifying Technician</title>
</head>
<body>
    <?php
        include("admin_conn.php");
        $id = intval($_GET['id']);

        $result = mysqli_query($con,"SELECT * FROM technicians WHERE tech_ID = $id;");
        
        while ($row = mysqli_fetch_array($result))
            {

    ?>

    <form action="Admin9technicianverifyupdate.php" method="post" id="technicianeditform" enctype="multipart/form-data">
        <input type="hidden" name="editingtechid" value="<?php echo $id; ?>">
        <img src="http://localhost/repairture/admin/admin_image/logo.png" id="editlogo3">

        <img src="data:image;base64, <?php echo $row['tech_profilepic']?>"id="technician_profile">
        <div id="techinfo">

        <label>Tech ID: </label>
        <input type="text" readonly name="tech_ID" value="<?php echo $row["tech_ID"]?>"> <br>

        <label>Tech Email:</label>
        <input type="email" readonly name="tech_email" value="<?php echo $row["tech_email"]?>"> <br>

        <label>Tech Password:</label>
        <input type="password" readonly name="tech_passwrd" value="<?php echo $row["tech_passwrd"]?>"> <br>

        <label>Tech Firstname:</label>
        <input type="text" readonly name="tech_firstname" value="<?php echo $row["tech_firstname"]?>"> <br>

        <label>Tech Lastname:</label>
        <input type="text" readonly name="tech_lastname" value="<?php echo $row["tech_lastname"]?>"> <br>

        <label>Tech Age: </label>
        <input type="text" readonly name="tech_age" value="<?php echo $row["tech_age"]?>"> <br>

        <label>Tech Gender:</label>
        <select name="techniciangender" readonly>
            <option value="male" <?php if ($row['tech_gender'] == "male") { ?>selected="selected"<?php } ?>>male</option>
            <option value="female" <?php if ($row['tech_gender'] == "female") { ?>selected="selected"<?php } ?>>female</option>
        </select> <br>

        <label>Tech Mobile:</label>
        <input type="text" readonly name="techmobile_num" value="<?php echo $row["tech_mobilenum"]?>" > <br>

        <label>Tech IC Number: </label>
        <input type="text" readonly minlength="12" maxlength="12" name="techic_num" value="<?php echo $row["tech_icnum"]?>"> <br>

        <label>Service Name:</label>
        <select name="technicianservice">
            <option value="Upholstery Cleaning" <?php if ($row['services_name'] == "Upholstery Cleaning") { ?>selected="selected"<?php } ?>>Upholstery Cleaning</option>
            <option value="Plumbing" <?php if ($row['services_name'] == "Plumbing") { ?>selected="selected"<?php } ?>>Plumbing</option>
            <option value="Electrical and Wiring" <?php if ($row['services_name'] == "Electrical and Wiring") { ?>selected="selected"<?php } ?>>Electrical and Wiring</option>
            <option value="Air-Conditioner" <?php if ($row['services_name'] == "Air-Conditioner") { ?>selected="selected"<?php } ?> >Air-Conditioner</option>
            <option value="Painting and Dry wall" <?php if ($row['services_name'] == "Painting and Dry wall") { ?>selected="selected"<?php } ?>>Painting and Dry wall</option>
            <option value="Gardening and Landscaping" <?php if ($row['services_name'] == "Gardening and Landscaping") { ?>selected="selected"<?php } ?>>Gardening and Landscaping</option>
        </select> <br>

        <label>Service Location:</label>
        <input type="text" readonly name="tech_location" value="<?php echo $row["service_location"]?>"> <br>

        <label> Addressline:</label>
        <input type="text" readonly name="tech_addressline" value="<?php echo $row["tech_addressline"]?>"> <br>

        <label>City:</label>
        <input type="text" readonly name="tech_city" value="<?php echo $row["tech_city"]?>"> <br>

        <label>State:</label>
        <input type="text" readonly name="tech_state" value="<?php echo $row["tech_state"]?>"> <br>

        <label>Poscode:</label>
        <input type="text" readonly name="tech_poscode" value="<?php echo $row["tech_poscode"]?>"> <br>

        </div>

        <label id="tech_ic_label"> IC Picture: </label>
        <img src="data:image;base64, <?php echo $row['tech_icpic']?>"id="technician_ic">

        <label id="tech_cert_label"> Cert Picture: </label>
        <img src="data:image;base64, <?php echo $row['tech_certpic']?>"id="technician_certificate">

        <label id="verifyingusertopic">This profile is viable</label> 
        <input type="checkbox" value="1" name="verifyinguser" id="verifyinguser" required>
        
    

        <input type="submit" value="Verify User" id="submittechedit">
    
    </form>

    <a onclick="return confirm('Delete this user record?')" href="Admin9verifytechniciandelete.php?id=<?php echo $id ?>" ><div id="deleteverify">Delete</div>
    <?php

        }
        mysqli_close($con);
    ?>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
        body{
            background-color: #eaeef1;
        }

        #technicianeditform{
            font-family: 'Poppins';
            font-weight: 0px;
            position: absolute;
            border:1px solid;
            width:600px;
            height:1750px; 
            overflow-y: scroll;
            left:500px;
            border-radius: 50px;
            box-shadow: 0px 30px 40px rgba(0, 0, 0, 0.1);
            background: white;
        }

        #technicianeditform::-webkit-scrollbar{
            width:0px;
        }

        #technician_profile{
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

        #techinfo{
            position: relative;
            top:225px;
            margin-left: 50px;
            line-height: 50px;
        }

        #tech_ic_label{
            position: absolute;
            top:1015px;
            left:50px;
        }
        #tech_ic{
            position: absolute;
            top:1018px;
            left:225px;
        }

        #technician_ic{
            border:1px solid;
            width:350px;
            height:250px;
            position: absolute;
            top:1050px;
            left:50px;
        }

        #tech_cert_label{
            position: absolute;
            top:1350px;
            left:50px;
        }

        #technician_certificate{
            position: absolute;
            border:1px solid;
            width:350px;
            height:250px;
            top:1390px;
            left:50px;
        }

        #tech_cert{
            position: absolute;
            top:1353px;
            left:230px;
        }

        #submittechedit{
            position: absolute;
            border-color: transparent;
            background: #4a4edb;
            color:white;
            font-weight: bold;
            font-family: 'Poppins';
            font-size: 15px;
            border-radius: 10px;
            top:1700px;
            left:450px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        #verifyingusertopic{
            position: absolute;
            top:1700px;
            left:50px;
        }

        #verifyinguser{
            position: absolute;
            top:1703px;
            left:225px;
        }

        #deleteverify{
            position: absolute;
            border: 1px solid;
            width:75px;
            text-align: center;
            color:red;
            border-radius: 10px;
            cursor: pointer;
            top:1710px;
            left:850px;
            font-family: 'Poppins';

        }
    </style>


</body>
</html>