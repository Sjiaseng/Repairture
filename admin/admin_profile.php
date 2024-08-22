<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
</head>
<body>
    <?php 
        include("admin_conn.php");
        $adminID = $_SESSION['admin_id'];

        $result = mysqli_query($con, "SELECT * FROM admins WHERE admin_ID='$adminID';");
        while ($row = mysqli_fetch_array($result)){
            echo '<img src="data:image;base64,'.$row["admin_profilepic"].'" id="myprofilepic">';
            echo '<div id="username">'.$row["admin_firstname"].' '.$row["admin_lastname"].'</div>';
        }
    
    ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
        #myprofilepic{
            width:50px;
            height:50px;
            border-radius: 50%;
            background-color: transparent;
            position: absolute;
            left:1140px;
            top:25.5px;
            border: 1px solid;
            border-color: transparent;
            box-shadow: 0px 30px 40px rgba(0, 0, 0, 0.1);
           
        }

        #username{
            font-family: 'Poppins';
            font-size: 21px;
            position: absolute;
            font-weight: bold;
            left:1215px;
            top:35px;
            
        }
    </style>
</body>
</html>