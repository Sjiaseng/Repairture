<?php
    try{
        include("admin_conn.php");

        $sql = "UPDATE admins SET
        admin_email='$_POST[admin_email]',
        admin_passwrd='$_POST[admin_passwrd]',
        admin_firstname='$_POST[admin_firstname]',
        admin_lastname='$_POST[admin_lastname]',
        admin_mobilenum='$_POST[admin_mobilenum]'
        WHERE admin_ID = $_POST[editingid]";

        if (mysqli_query($con, $sql)) {
            echo "<script> alert('Record Updated!'); window.location.href='Admin8_Admin.php';</script>";
        }
        else{
            echo "<script> alert('Record Failed to Update!'); window.location.href='Admin8_Admin.php';</script>";
        }
    }

    catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
    }
?>

