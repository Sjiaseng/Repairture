<?php
    try{
        include("admin_conn.php");

        $sql = "UPDATE users SET
        user_verify='$_POST[verifyinguser]'
        WHERE user_ID= $_POST[editinguserid];";

        if (mysqli_query($con, $sql)) {
            echo "<script> alert('User Verified!'); window.location.href='Admin10_User.php';</script>";
        }
        else{
            echo "<script> alert('Something wrong please try again!'); //window.location.href='Admin10_User.php';</script>";
            echo mysqli_error($con);
        }
    }

    catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
    }
?>
