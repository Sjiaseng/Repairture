<?php
    try{
        include("admin_conn.php");
        $id = intval($_GET['id']);

        $sql="DELETE FROM todolist WHERE todo_ID=$id";
        $result = mysqli_query($con, $sql);
            if ($result){
                echo "<script> window.location.href='Admin3_To-Do_Lists.php';</script>";
                mysqli_close($con);
            }
            else {
                echo "<script> alert('Failed to delete this record!'); window.location.href='Admin3_To-Do_Lists.php';</script>";
                mysqli_close($con);
            }
        }
        catch(Exception $e){
            echo 'Message: ' .$e->getMessage();
        }
?>