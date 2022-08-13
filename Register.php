<?php session_start(); ?>
<!doctype html>
<html lang="en">
<?php
    if(isset($_GET['error'])) //<!-- Checking the error that we wrote in URL -->
            { 
                if($_GET['error'] == 'usertaken')
                    echo '<p class="">Mobile already registered. Please change your mobile Number.</p>';
                else if($_GET['error'] == 'passwordinvalid')
                    echo '<p class="">Password and Confirm Password does not match. Please try again.</p>';
                else if($_GET['error'] == 'sqlerror')
                    echo '<p class="">Unable to register, Please check your connection and try again</p>';
                else if($_GET['error'] == 'sqlerror2')
                    echo '<p class="">Unable to register, Please check your connection and try again</p>';
            }
            else if(isset($_GET['signup']))
                if($_GET['signup'] == "success")
                    echo '<p class="">Sign up successfull! Click <a href="Login.php">here</a> to login.</p>';
?>
<head>
    <title>Registeration Page</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
    <!-- Nav Bar -->
    <section class="nav">
        <a href="/" class="recircle" style="float: left;"><b>ReCircle</b></a>|
        <section class="protectedSection">
            <a href="/cart"><b>Cart</b></a>|
            <a href="/orderHistory"><b>Order History</b></a>|
            <a href="/profile"><b>Profile</b></a></div>|
            <a class="logout"><b>Logout</b></a>
        </section>
        <section class="unprotectedSection">
            <a href="Login.php"><b>Login</b></a>|
            <a href="Register.php"><b>Register</b></a>
            <a href="locateUs.php"><b>Locate Us</b></a>
            <a href="rewards.php"><b>rewards</b></a>
            <a href="FAQ.php"><b>FAQs</b></a>
        </section>
    </section>
    <!-- End Of Nav Bar -->
    <section>
        <br>
     <h1>Register 2.4</h1>
        <form method="post" action="checkregister.php">
            <label for="name">Username:</label>
            <input type="text" name="username" id = "username" required>
            <br>
            <label for="contact">Mobile Number:</label>
            <input type="number" id="contact" name="contact" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <label for="password">Confirm password:</label>
            <input type="password" id="confpw" name="confpw" required>
            <br>
            <button role="submit" name="signup_submit">Create Account</button>
        </form>
    </section>
</body>

</html>
