<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleting</title>
</head>
<body>
    <?php
        try{
            include("admin_conn.php");
            $id = intval($_GET['id']);

            $sql="DELETE FROM technicians WHERE tech_ID=$id";
            $result = mysqli_query($con, $sql);

            if ($result){
                echo "<script> alert('Record deleted!'); window.location.href='Admin9_Technician.php';</script>";
                mysqli_close($con);
            }
            else {
                echo "<script> alert('Failed to delete this record! Please Retry'); window.location.href='Admin9_Technician.php';</script>";
                mysqli_close($con);
            }
        }
        catch(Exception $e){
            echo 'Message: ' .$e->getMessage();
        }
    ?>
</body>
</html>