<?php
    try{
        include("admin_conn.php");

        $sql = "UPDATE technicians SET
        tech_verify='$_POST[verifyinguser]'
        WHERE tech_ID= $_POST[editingtechid];";

        if (mysqli_query($con, $sql)) {
            echo "<script> alert('User Verified!'); window.location.href='Admin9_Technician.php';</script>";
        }
        else{
            echo "<script> alert('Something wrong please try again!'); //window.location.href='Admin9_Technician.php';</script>";
        }
    }

    catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
    }
?>
