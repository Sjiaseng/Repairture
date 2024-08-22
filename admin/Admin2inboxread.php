<?php
    try{
        include("admin_conn.php");
        include("session.php");
        $adminID = $_SESSION['admin_id'];
        $sql = "UPDATE inbox SET
        inbox_read = 1 WHERE inbox_read = 0 AND admin_ID='$adminID';";



        if (mysqli_query($con, $sql)) {
            echo "<script> window.location.href='Admin2_Inbox.php';</script>";
        }
        else{
            echo "<script> window.location.href='Admin2_Inbox.php';</script>";
        }
    }

    catch(Exception $e){
        echo 'Message: ' .$e->getMessage();
    }
?>