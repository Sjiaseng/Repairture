<?php
    try{
        include("admin_conn.php");

        $sql = "UPDATE technicians SET
        tech_email='$_POST[tech_email]',
        tech_passwrd='$_POST[tech_passwrd]',
        tech_firstname='$_POST[tech_firstname]',
        tech_lastname='$_POST[tech_lastname]',
        tech_age='$_POST[tech_age]',
        tech_gender='$_POST[techniciangender]',
        tech_mobilenum='$_POST[techmobile_num]',
        tech_icnum='$_POST[techic_num]',
        services_name='$_POST[technicianservice]',
        service_location='$_POST[tech_location]',
        tech_addressline='$_POST[tech_addressline]',
        tech_city='$_POST[tech_city]',
        tech_state='$_POST[tech_state]',
        tech_poscode='$_POST[tech_poscode]'
        WHERE tech_ID = $_POST[editingtechid]";

        if (mysqli_query($con, $sql)) {
            echo "<script> alert('Record Updated!'); window.location.href='Admin9_Technician.php';</script>";
        }
        else{
            echo "<script> alert('Record Failed to Update!'); window.location.href='Admin9_Technician.php';</script>";
        }
    }

    catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
    }
?>
