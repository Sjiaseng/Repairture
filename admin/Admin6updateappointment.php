<?php
    try{
        include("admin_conn.php");

        $sql = "UPDATE booking SET
        user_ID='$_POST[user_ID]',
        tech_ID='$_POST[tech_ID]',
        created_at='$_POST[created_at]',
        services_name='$_POST[services_name]', 
        booking_status='$_POST[booking_status]', 
        booking_date_time='$_POST[booking_date_time]', 
        booking_title='$_POST[booking_title]', 
        booking_comment='$_POST[booking_comment]', 
        user_cancel_note='$_POST[user_cancel_note]', 
        tech_cancel_note='$_POST[tech_cancel_note]'
        WHERE booking_ID=$_POST[editingid];";

        if (mysqli_query($con, $sql)) {
            echo "<script> alert('Record Updated!'); window.location.href='Admin6_Appointment_Status.php';</script>";
        }
        else{
            echo "<script> alert('Record Failed to Update!'); window.location.href='Admin6_Appointment_Status.php';</script>";
        }
    }

    catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
    }
?>