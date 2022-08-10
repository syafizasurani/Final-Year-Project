<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEP Inasis Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section>
        <div class="imgBx">
            <img src="image/uum.jpg">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>LOGIN TO HEP INASIS MANAGEMENT SYSTEM</h2>
                <form action="server/process_login.php" method="post">
                    <div class="role" id="filters" name="role">
                        <span>I am a &nbsp; &nbsp; &nbsp;</span>
                        <select name="role" id="role" style="width: 150px">
                            <option value="" disabled="" selected="">&nbsp; Choose role</option>
                            <option value="student">&nbsp; student</option>
                            <option value="staff">&nbsp; staff</option>
                        </select>
                    </div>
                    <div class="inputBx">
                        <span>Username</span>
                        <input type="text" id="username" name="username">
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" id="password" name="password">
                    </div>
                    <div class="forgot">
                        <a href="#">Forgot password?</a>
                        <!-- <span><a href="#">Forgot password?</a></span> -->
                        <!-- <input type="text" name=""> -->
                        <!-- <label><input type="checkbox" name=""> Remember me</label> -->
                    </div>
                    <div class="inputBx">
                        <input type="submit" id="btn" value="LOGIN" name="login">
                    </div>
                    <!-- <div class="inputBx">
                        <p>Don't have an account? <a href="#">Sign Up</a></p>
                    </div> -->
                    <h6>Need Help? <br> Call: +604-928 6666 or Email: itservices@uum.edu.my <br> © Copyright 2021 - Universiti Utara Malaysia</h6>
                </form>
            </div>
        </div>
    </section>
</body>
</html>