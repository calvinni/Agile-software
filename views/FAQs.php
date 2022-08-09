<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>

    <section class="nav">
        <a href="/" class="recircle" style="float: left;"><b>ReCircle</b></a>
        <section class="protectedSection">
            <a href="/cart"><b>Cart</b></a>|
            <a href="/orderHistory"><b>Order History</b></a>|
            <a href="/profile"><b>Profile</b></a></div>|
            <a class="logout"><b>Logout</b></a>
        </section>
        <section class="unprotectedSection">
            <a href="login.html"><b>Login</b></a>|
            <a href="register.html"><b>Register</b></a>
            <a href="locateUs.html"><b>Locate Us</b></a>
            <a href="rewards.html"><b>rewards</b></a>
            <a href="FAQ.html"><b>FAQs</b></a>
        </section>
        
    </section>

    <h1>Welcome to ReCircle!</h1>
    
    <script src='./js/jquery-3.5.0.min.js'></script>
    <script src='./js/index.js'></script>
</body>

</html>
