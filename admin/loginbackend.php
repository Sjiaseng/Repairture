<?php
include("admin_conn.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($con, $_POST['login_email']);
    $password = mysqli_real_escape_string($con, $_POST['login_password']);
    $sql = "SELECT user_ID,user_verify FROM users WHERE user_email='$email' and user_passwrd='$password'";
    $sql2 = "SELECT tech_ID,tech_verify  FROM technicians WHERE tech_email='$email' and tech_passwrd='$password'";
    $sql3 = "SELECT admin_ID FROM admins WHERE admin_email='$email' and admin_passwrd='$password'";
    $result = mysqli_query($con, $sql);
    $result2 = mysqli_query($con, $sql2);
    $result3 = mysqli_query($con, $sql3);
    if ($result and $result2 and $result3) {
        $rowcount = mysqli_num_rows($result);
        $rowcount2 = mysqli_num_rows($result2);
        $rowcount3 = mysqli_num_rows($result3);
        $row = mysqli_fetch_assoc($result);
        $row2 = mysqli_fetch_assoc($result2);
        $row3 = mysqli_fetch_assoc($result3);
    }
    if ($rowcount == 1 || $rowcount2 == 1 || $rowcount3 == 1) {
        if (isset($_POST['remember'])) {
            setcookie('user_email', $email, time() + 60 * 60 * 24 * 30);
            setcookie('user_password', $password, time() + 60 * 60 * 24 * 30);
        } else {
            if (isset($_COOKIE["user_email"])) {
                setcookie("user_email", "");
            }
            if (isset($_COOKIE["user_password"])) {
                setcookie("user_password", "");
            }
            if ($rowcount == 1) {
                if ($row['user_verify'] == 1) {
                    $_SESSION['user_id'] = $row['user_ID'];
                    header("location: ../user/dashboard.php");
                } else {
                    header("location: dashboard_unverify.php");
                }
            } elseif ($rowcount2 == 1) {
                if ($row2['tech_verify'] == 1) {
                    $_SESSION['tech_id'] = $row2['tech_ID'];
                    header("location: tech_dashboard.php");
                } else {
                    header("location: dashboard_unverify.php");
                }
            } elseif ($rowcount3 == 1) {
                $_SESSION['admin_id'] = $row3['admin_ID'];
                header("location: Admin1_Dashboard.php");
            }
        }
    } else {
        echo '<script>
        alert ("Your Login Name or Password is invalid. Please re-login");
        window.history.back();
        </script>';
    }

}
mysqli_close($con);
?>