<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <link rel="stylesheet" href="Admin5_Appointment_List.css">
</head>
<body>
    <?php
        include_once("Admin0_Navigator.php");
    ?>

    <div class="appointmentlistbackground">
        <div class="appointmentsection">
            <div id="appointmentpicture"><img src="http://localhost/repairture/admin/admin_image/upholstery.jpg" id="upholstery"></div>
            <span id="appointmenttopic">Upholstery Cleaning Services</span>
            <span id="appointmentdesc">We provide cleaning for all fabric furniture to your house! (dry / wet cleaning) </span>
            <button class="booknow" onclick=showpop()>Book now!</button>
        </div>
        <div class="appointmentsection">
            <div id="appointmentpicture"><img src="http://localhost/repairture/admin/admin_image/plumbing.jpeg" id="plumbing"></div>
            <span id="appointmenttopic">Plumbing Services</span>
            <span id="appointmentdesc">We provide all plumbing services such as repairing or installing water pipes!</span>
            <button class="booknow" onclick=showpop()>Book now!</button>
        </div>
        <div class="appointmentsection">
            <div id="appointmentpicture"><img src="http://localhost/repairture/admin/admin_image/electrical.jpeg" id="electrical"></div>
            <span id="appointmenttopic">Electrical & Wiring Services</span>
            <span id="appointmentdesc">We provide electrical services such as repairing or installing electronics!</span>
            <button class="booknow" onclick=showpop()>Book now!</button>
        </div>
        <div class="appointmentsection">
            <div id="appointmentpicture"><img src="http://localhost/repairture/admin/admin_image/air-cond.jpg" id="aircond"></div>
            <span id="appointmenttopic">Air-Conditioner Services</span>
            <span id="appointmentdesc">Air-Cond services such as cleaning, fixing and installing!</span>
            <button class="booknow" onclick=showpop()>Book now!</button>
        </div>
        <div class="appointmentsection">
            <div id="appointmentpicture"><img src="http://localhost/repairture/admin/admin_image/painting.jpeg" id="painting"></div>
            <span id="appointmenttopic">Painting & Dry Walls</span>
            <span id="appointmentdesc">We provide services like paint, renew and decorate your house!</span>
            <button class="booknow" onclick=showpop()>Book now!</button>
        </div>
        <div class="appointmentsection">
            <div id="appointmentpicture"><img src="http://localhost/repairture/admin/admin_image/gardening.jpg" id="gardening"></div>
            <span id="appointmenttopic">Gardening & Landscaping</span>
            <span id="appointmentdesc">We help to decorate, provide knowledge and grow the plants!</span>
            <button class="booknow" onclick=showpop()>Book now!</button>
        </div>
    </div>

    <div id="appointmentpopup">
        <span id="appointmentpopup1">Hold On!</span>
        <span id="appointmentpopup2">You can't book appointment as an Admin!</span>
        <button id="appointmentpopup3" onclick=unshowpop()> ok </button> 
    </div>


    <script src="Admin5_Appointment_List.js"></script>
</body>
</html>