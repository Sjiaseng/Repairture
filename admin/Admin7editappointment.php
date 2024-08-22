<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing Appointment</title>
    <link rel="stylesheet" href="Admin7editappointment.css">
</head>
<body>
    
    <?php
        include("admin_conn.php");
        $id = intval($_GET['id']);

        $result = mysqli_query($con,"SELECT booking.user_ID, booking.tech_ID, booking.user_cancel_note, booking.tech_cancel_note, booking.booking_title, booking.booking_comment, 
            booking.booking_status, booking.booking_ID, booking.created_at, booking.services_name, users.user_firstname, users.user_lastname, 
            booking.booking_date_time, users.user_mobilenum, users.user_email, technicians.tech_firstname, technicians.tech_lastname, 
            technicians.tech_mobilenum, technicians.tech_email FROM booking JOIN users ON users.user_ID = booking.user_ID JOIN technicians ON
            technicians.tech_ID = booking.tech_ID WHERE booking_ID=$id;");
        
        while ($row = mysqli_fetch_array($result))
            {

    ?>

    <form action="Admin7updateappointment.php" method="post" id="updateappointmentform">

        <img src="http://localhost/repairture/admin/admin_image/logo.png" id="editlogo">
        <p id="edittext"> Editing Appointment </p>
        <div class="editappointment">
        <input type="hidden" name="editingid" value="<?php echo $row['booking_ID'] ?>">

            <label>Appointment ID: &nbsp; </label>
            <input type="text" name="booking_ID" value="<?php echo $row['booking_ID']?>" readonly> <br> 
            <label>Date Created: &nbsp; </label>
            <input type="date" name="created_at" value="<?php echo $row['created_at']?>" required> <br> <br>

            <label>User ID: &nbsp; </label>
            <input type="text" name="user_ID" value="<?php echo $row['user_ID']?>" required> <br>
            <label>User Name: &nbsp; </label>
            <input type="text" name="user_username" readonly value="<?php echo $row['user_firstname'], ' ', $row['user_lastname']?>"> <br>
            <label>User Phone: &nbsp; </label>
            <input type="text" name="user_phone" readonly value="<?php echo $row['user_mobilenum']?>"> <br>
            <label>User Email: &nbsp; </label>
            <input type="text" name="user_email" readonly value="<?php echo $row['user_email']?>"> <br> <br>

            <label>Tech ID: &nbsp; </label>
            <input type="text" name="tech_ID" value="<?php echo $row['tech_ID']?>" required> <br>
            <label>Technician Name: &nbsp; </label>
            <input type="text" name="tech_username" readonly value="<?php echo $row['tech_firstname'], ' ', $row['tech_lastname']?>"> <br>
            <label>Technician Phone: &nbsp; </label>
            <input type="text" name="tech_phone" readonly value="<?php echo $row['tech_mobilenum']?>"> <br>
            <label>Technician Email: &nbsp; </label>
            <input type="text" name="tech_email" readonly value="<?php echo $row['tech_email']?>"> <br> <br>
            

            <label>Services Name: &nbsp; </label>
                <select name="services_name" required> 
                    <option value="Plumbing" <?php if ($row['services_name'] == "Plumbing") { ?>selected="selected"<?php } ?>>Plumbing</option>
                    <option value="Upholstery Cleaning" <?php if ($row['services_name'] == "Upholstery Cleaning") { ?>selected="selected"<?php } ?>>Upholstery Cleaning</option>
                    <option value="Electrical and Wiring" <?php if ($row['services_name'] == "Electrical and Wiring") { ?>selected="selected"<?php } ?>>Electrical and Wiring</option>
                    <option value="Air-Conditioner" <?php if ($row['services_name'] == "Air-Conditioner") { ?>selected="selected"<?php } ?>>Air-Conditioner</option>
                    <option value="Painting and Dry wall" <?php if ($row['services_name'] == "Painting and Dry wall") { ?>selected="selected"<?php } ?>>Painting and Dry wall</option>
                    <option value="Gardening and Landscaping" <?php if ($row['services_name'] == "Gardening and Landscaping") { ?>selected="selected"<?php } ?>>Gardening and Landscaping</option>
                </select> <br>
            
            <label>Booking Status: &nbsp; </label>
            <select name="booking_status" required>
                <option value="Pending" <?php if ($row['booking_status'] == "Pending") { ?>selected="selected"<?php } ?>>Pending</option>
                <option value="ComingSoon" <?php if ($row['booking_status'] == "ComingSoon") { ?>selected="selected"<?php } ?>>ComingSoon</option>
                <option value="Complete" <?php if ($row['booking_status'] == "Complete") { ?>selected="selected"<?php } ?>>Complete</option>
                <option value="Cancel" <?php if ($row['booking_status'] == "Cancel") { ?>selected="selected"<?php } ?> >Cancel</option>
            </select> <br>

            <label>Appointment Date & Time: &nbsp; </label>
            <input type="text" name="booking_date_time" value="<?php echo $row['booking_date_time']?>" required> <br> 
            <label>Booking Title: &nbsp; </label>
            <input type="text" name="booking_title" value="<?php echo $row['booking_title']?>" required> <br>
            <label>Booking Comment: &nbsp; </label>
            <input type="text" name="booking_comment" value="<?php echo $row['booking_comment']?>" required> <br> <br>

            <label>User Cancel Note: &nbsp; </label>
            <input type="text" name="user_cancel_note" value="<?php echo $row['user_cancel_note']?>" required> <br>
            <label>Tech Cancel Note: &nbsp; </label>
            <input type="text" name="tech_cancel_note" value="<?php echo $row['tech_cancel_note']?>" required> <br>

            <input type="submit" id="editsubmit" name="submissionedit" value="Save"><br><br>
        </div>
    </form>

    <?php
        }
        mysqli_close($con);
    ?>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
        #updateappointmentform{
            border:1px solid;
            position: absolute;
            width:500px;
            height:725px;
            left:525px;
            top:20px;
            border-radius: 20px;
            overflow-y: scroll;
            background: white;
            border-color: #888888;
            box-shadow: 0px 3px 8px #888888;
            padding-top: 50px;
            padding-left: 25px;
        }

        #updateappointmentform::-webkit-scrollbar{
            width:0px;
        }

        body{
            background-color:#eaeef1;
            font-family: 'Poppins';
            font-weight: bold;
            font-size: 15px;
        }

        #editlogo{
            position: absolute;
            width:150px;
            top:10px;
            left:175px;
        }

        #edittext{
            position: absolute;
            font-size: 20px;
            left:140px;
            top:45px;
            color:#4a4edb;
            text-decoration: underline;
        }

        body::-webkit-scrollbar{
            width:0px;
        }

        .editappointment{
            position:absolute;
            top:115px;
            left:35px;
            line-height: 35px;
        }

        #editsubmit{
            position: absolute;
            top:750px;
            left:350px;
            margin-top: 10px;
            width:100px;
            height:30px;
            color:white;
            font-weight: bold;
            background:#4a4edb;
            border-color: transparent;
            cursor: pointer;
        }
    </style>
</body>
</html>
