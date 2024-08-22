<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="mystyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
</head>

<body>
    <img src="admin_image/logo.png" class="logo">
    <form action="loginbackend.php" method="post" class="login_page" enctype="multipart/form-data">
        <section id="login_interface">
            <div id="email" name="email">
                <div>
                    <input type="text" class="login_input" placeholder="Enter your email address" name="login_email"
                        required="required" />
                </div>
            </div>
            <div id="password" name="password">
                <div>
                    <input type="password" class="login_input" placeholder="Enter your password" name="login_password"
                        required="required" />
                </div>
            </div>
            <br />
            <div class="signup_container">
                <input type="checkbox" id="remember" name="remember" />
                <label for="remember">Remember me </label>
            </div>
            <br />
            <br />
            <input type="submit" class="login_button" value="Login Now" name="login_button" />
            <br />
            <span id="logintext">or Sign up now as</span>
            <br />
            <input type="button" onclick="location.href = '../signup/usersignup.php';" class="signup_button"
                value="Sign Up Now" name="signup_button" />
        </section>

    </form>

</body>

</html>