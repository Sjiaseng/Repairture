<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>
    <link rel="stylesheet" href="Admin2_Inbox.css">
</head>
<body>
    <?php
        include_once("Admin0_Navigator.php");
        include("admin_conn.php");
    ?>

    <a href="Admin2inboxread.php"><span id="readinbox">Mark as Read </span></a>

    <div class="inboxoutbg">
        <div class="inboxheader">
            <span id="inboxtopic1">Inbox ID</span>
            <span id="inboxtopic2">Message</span>
            <span id="inboxtopic3">Created Date</span>
        </div>


        <div class="inboxinbg">
            <?php 
                $adminID = $_SESSION['admin_id'];
                $result = mysqli_query($con,"SELECT * FROM inbox WHERE admin_ID = $adminID ORDER BY inbox_read ASC, inbox_ID DESC ;");
                while ($row = mysqli_fetch_array($result)){
                    if ($row['inbox_read']== 0){
                        echo'<div id="inboxframe">
                        <span id="inboxppl2">'.$row["inbox_ID"].'</span>
                        <span id="inboxmsg2">'.$row["inbox_message"].'</span>
                        <span id="inboxdate2">'. $row["created_at"] .'</span>
                        </div>';
                    }
                    else {
                        echo'<div id="inboxframe">
                        <span id="inboxppl">'.$row["inbox_ID"].'</span>
                        <span id="inboxmsg">'.$row["inbox_message"].'</span>
                        <span id="inboxdate">'.$row["created_at"].' </span>
                        </div>';
                        }
                    }  
            ?>
    </div>


    <script src="Admin2_Inbox.js"></script>
</body>
</html>
