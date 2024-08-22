<?php
    $con = mysqli_connect("localhost","root", "" ,"repairture");

    if (mysqli_connect_errno()){
        echo "Connection Status: Failed to connect to MySQL:" . mysqli_connect_error();
    }
    /*
    else{
        echo "Connection Status: Connection success";
    }
    */
?>  