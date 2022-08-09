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
            <a href="index.php"><b>Home</b></a>|
            <a href="/cart"><b>Cart</b></a>|
            <a href="/orderHistory"><b>Order History</b></a>|
            <a href="/profile"><b>Profile</b></a></div>|
            <a class="logout"><b>Logout</b></a>
        </section>
        <section class="unprotectedSection">
            <a href="login.php"><b>Login</b></a>|
            <a href="register.php"><b>Register</b></a>
            <a href="locateUs.php"><b>Locate Us</b></a>
            <a href="rewards.php"><b>rewards</b></a>
            <a href="FAQ.php"><b>FAQs</b></a>
        </section>
        
    </section>

    <h1>Welcome to ReCircle!</h1>
    <p> include about us, recycle process using recircle in this page.</p>

</body>

</html>
