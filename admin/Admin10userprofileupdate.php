<?php
    try{
        include("admin_conn.php");

        $sql = "UPDATE users SET
        user_email='$_POST[user_email]',
        user_passwrd='$_POST[user_passwrd]',
        user_firstname='$_POST[user_firstname]',
        user_lastname='$_POST[user_lastname]',
        user_age='$_POST[user_age]',
        user_gender='$_POST[usergender]',
        user_mobilenum='$_POST[usermobile_num]',
        user_icnum='$_POST[useric_num]',
        user_addressline='$_POST[user_addressline]',
        user_city='$_POST[user_city]',
        user_state='$_POST[user_state]',
        user_poscode='$_POST[user_poscode]'
        WHERE user_ID = $_POST[editinguserid]";

        if (mysqli_query($con, $sql)) {
            echo "<script> alert('Record Updated!'); window.location.href='Admin10_User.php';</script>";
        }
        else{
            echo "<script> alert('Record Failed to Update!'); window.location.href='Admin10_User.php';</script>";
        }
    }

    catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
    }
?>
