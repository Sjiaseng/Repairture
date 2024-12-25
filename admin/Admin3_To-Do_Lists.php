<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do Lists</title>
    <link rel="stylesheet" href="Admin3_To-Do_Lists.css">
</head>
<body>
    <?php
        include_once("Admin0_Navigator.php");
        include("admin_conn.php");
    ?>

    <div class="todoheader">
        <span class="headtopic">To-Do Lists</span>

        <form action="Admin3_To-Do_Lists.php" method="post">
            <select id="sortselection" name="todo-filter">
                <option value="Ascending">Ascending</option>
                <option value="Descending">Descending</option>
                <option value="Starred">Starred</option>
                <option value="UnStarred">UnStarred</option> 
            </select>
            <input type="submit" id="todosubmitbtn" value="Apply">
        </form>
        
        <span class="addtodo" onclick=addtodo()><i class='bx bx-plus'></i></span>
    </div>

    <div class="todobg">
        <?php
            $adminID = $_SESSION['admin_id'];

            if (isset($_POST['todo-filter'])){
                $filter = $_POST['todo-filter'];
            }
            else{
                $filter = null; 
            }

            if ($filter == "Ascending"){
                $result = mysqli_query($con,"SELECT * FROM todolist WHERE admin_ID = $adminID ORDER BY todo_starred DESC , todo_date ASC"); 
                while ($row = mysqli_fetch_array($result)){
                    if($row["todo_starred"] == "True"){
                        echo '<div class="todoframe">
                            <span class="todotopic">'.$row["todo_subject"].'</span>
                            <span class="tododate">'.$row["todo_date"].'</span>
                            <span id="todostar"><i class="bx bxs-star" ></i></span>
                            <a href="Admin3tododelete.php?id='.$row["todo_ID"].'"><span class="deletingtodo" id="deletingtodo"><i class="bx bx-trash" ></i></span></a>
                            </div>';
                    }
                    else {
                        echo '<div class="todoframe">
                            <span class="todotopic">'.$row["todo_subject"].'</span>
                            <span class="tododate">'.$row["todo_date"].'</span>
                            <span id="todostar2"><i class="bx bxs-star" ></i></span>
                            <a href="Admin3tododelete.php?id='.$row["todo_ID"].'"><span class="deletingtodo" id="deletingtodo"><i class="bx bx-trash" ></i></span></a>
                            </div>';
                    }
                }
            }

            else if ($filter == "Descending"){
                $result = mysqli_query($con,"SELECT * FROM todolist WHERE admin_ID = $adminID ORDER BY todo_starred DESC , todo_date DESC"); 
                while ($row = mysqli_fetch_array($result)){
                    if($row["todo_starred"] == "True"){
                        echo '<div class="todoframe">
                            <span class="todotopic">'.$row["todo_subject"].'</span>
                            <span class="tododate">'.$row["todo_date"].'</span>
                            <span id="todostar"><i class="bx bxs-star" ></i></span>
                            <a href="Admin3tododelete.php?id='.$row["todo_ID"].'"><span class="deletingtodo" id="deletingtodo"><i class="bx bx-trash" ></i></span></a>
                            </div>';
                    }
                    else {
                        echo '<div class="todoframe">
                            <span class="todotopic">'.$row["todo_subject"].'</span>
                            <span class="tododate">'.$row["todo_date"].'</span>
                            <span id="todostar2"><i class="bx bxs-star" ></i></span>
                            <a href="Admin3tododelete.php?id='.$row["todo_ID"].'"><span class="deletingtodo" id="deletingtodo"><i class="bx bx-trash" ></i></span></a>
                            </div>';
                    }
                }
            }

            else if ($filter == "Starred"){
                $result = mysqli_query($con,"SELECT * FROM todolist WHERE todo_starred='True' AND admin_ID = $adminID"); 
                while ($row = mysqli_fetch_array($result)){
                    if($row["todo_starred"] == "True"){
                        echo '<div class="todoframe">
                            <span class="todotopic">'.$row["todo_subject"].'</span>
                            <span class="tododate">'.$row["todo_date"].'</span>
                            <span id="todostar"><i class="bx bxs-star" ></i></span>
                            <a href="Admin3tododelete.php?id='.$row["todo_ID"].'"><span class="deletingtodo" id="deletingtodo"><i class="bx bx-trash" ></i></span></a>
                            </div>';
                    }
                    else {
                        echo '<div class="todoframe">
                            <span class="todotopic">'.$row["todo_subject"].'</span>
                            <span class="tododate">'.$row["todo_date"].'</span>
                            <span id="todostar2"><i class="bx bxs-star" ></i></span>
                            <a href="Admin3tododelete.php?id='.$row["todo_ID"].'"><span class="deletingtodo" id="deletingtodo"><i class="bx bx-trash" ></i></span></a>
                            </div>';
                    }
                }
            }
            
            else if ($filter == "UnStarred"){
                $result = mysqli_query($con,"SELECT * FROM todolist WHERE todo_starred ='' AND admin_ID = $adminID ORDER BY todo_date ASC"); 
                while ($row = mysqli_fetch_array($result)){
                    if($row["todo_starred"] == "True"){
                        echo '<div class="todoframe">
                            <span class="todotopic">'.$row["todo_subject"].'</span>
                            <span class="tododate">'.$row["todo_date"].'</span>
                            <span id="todostar"><i class="bx bxs-star" ></i></span>
                            <a href="Admin3tododelete.php?id='.$row["todo_ID"].'"><span class="deletingtodo" id="deletingtodo"><i class="bx bx-trash" ></i></span></a>
                            </div>';
                    }
                    else{
                        echo '<div class="todoframe">
                            <span class="todotopic">'.$row["todo_subject"].'</span>
                            <span class="tododate">'.$row["todo_date"].'</span>
                            <span id="todostar2"><i class="bx bxs-star" ></i></span>
                            <a href="Admin3tododelete.php?id='.$row["todo_ID"].'"><span class="deletingtodo" id="deletingtodo"><i class="bx bx-trash" ></i></span></a>
                            </div>';
                    }
                }
            }

            else{
                $result = mysqli_query($con,"SELECT * FROM todolist WHERE admin_ID = $adminID ORDER BY todo_starred DESC , todo_date ASC"); 
                while ($row = mysqli_fetch_array($result)){
                    if($row["todo_starred"] == "True"){
                        echo '<div class="todoframe">
                            <span class="todotopic">'.$row["todo_subject"].'</span>
                            <span class="tododate">'.$row["todo_date"].'</span>
                            <span id="todostar"><i class="bx bxs-star" ></i></span>
                            <a href="Admin3tododelete.php?id='.$row["todo_ID"].'"><span class="deletingtodo" id="deletingtodo"><i class="bx bx-trash" ></i></span></a>
                            </div>';
                    }
                    else {
                        echo '<div class="todoframe">
                            <span class="todotopic">'.$row["todo_subject"].'</span>
                            <span class="tododate">'.$row["todo_date"].'</span>
                            <span id="todostar2"><i class="bx bxs-star" ></i></span>
                            <a href="Admin3tododelete.php?id='.$row["todo_ID"].'"><span class="deletingtodo" id="deletingtodo"><i class="bx bx-trash" ></i></span></a>
                            </div>';
                    }
                }
            }
        
        ?>
    </div>

    <form id="to-do-form" action="Admin3_To-Do_Lists.php" method="POST">
        <i class='bx bx-x-circle' id="closingform" onclick=closingform()></i>
        <p class="to-do-header"> Creating To-Do Lists </p>
        <p class="to-do-content1"> Subject: </p>
        <input type = "text" name="todosubject" class="todocontent1" placeholder="Subject" required>
        <p class="to-do-content2"> Due Date: </p>
        <input type = "date" name="tododate" class="todocontent2" placeholder="Due date" required>
        <span id="checkstar"> Star List: &nbsp; <input type= "checkbox" name="checkstar" value="True" id="checkstar2"> </span>
        <input type = "submit" id="savetodo">
    </form>

    <?php
        if (isset($_POST['todosubject'])){
            $sql="INSERT INTO todolist (admin_ID, tech_ID, todo_subject, todo_date, todo_starred)
            VALUES ($adminID, NULL, '$_POST[todosubject]', '$_POST[tododate]', '$_POST[checkstar]')"; 
            
            if (mysqli_query($con,$sql)) {
                echo '<script> window.location.href = "Admin3_To-Do_Lists.php"; </script>';
            }

            mysqli_close($con);
        }
    ?>

    <script src="Admin3_To-Do_Lists.js"></script>
    
</body>
</html>
