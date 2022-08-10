<?php session_start(); ?>
<!doctype html>
<html lang="en">
<?php
          if(isset($_GET['error']) && $_GET['error'] == 'wrongpwd') 
            echo '<p class="">Incorrect password</br>Please try again</p>';
          else if(isset($_GET['error']) && $_GET['error'] == 'emailDNE')
            echo '<p class="">Unregistered mobile</br>Please try again</p>';
          ?>
<head>
    <title>Login Page</title>
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
        <h1>Login to ReCircle</h1>
        <!-- Login Form -->
        <form id="form_login" name="form_login" method="post" action="checklogin.php">
            <label for="mobile">Mobile:</label>
            <input type="number" type="Mobile" id="LoginMobile" name="Mobile" placeholder="Phone Number">
            <br>
            <label for="password">Password:</label>
            <input type="password" type="password" id="loginPass" name="password" placeholder="Password">
            <br>
            <button type="submit" name="login_submit">Sign in</button>
        </form>
        <!-- End Of Login Form -->
    </section>

</body>

</html>
