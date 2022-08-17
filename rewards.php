
<!doctype html>
<html lang="en">
<?php
session_start();
require 'dbh.php';

$UID = $_SESSION['userId'];
$name = $_SESSION['userName'];
$sql = "SELECT * FROM users WHERE ID = '$UID'";
$Id = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($Id); 
$point = $user['Points'];

        if (isset($_POST['voucher_10']))
        {
            if ($point > 1000)
            {
                $newpoints = $point - 1000;
                $SQL = "UPDATE users SET Points = '$newpoints' WHERE ID = '$UID'";
                $result = mysqli_query($conn, $SQL);
            }
            else
            {
                header("Location: ../rewards.php?insufficent=1000");
                exit();
            }
        }
        else if (isset($_POST['voucher_25']))
        {
            if ($point > 2000)
            {
                $newpoints = $point - 2000;
                $SQL = "UPDATE users SET Points = '$newpoints' WHERE ID = '$UID'";
                $result = mysqli_query($conn, $SQL);
            }
            else
            {
                header("Location: ../rewards.php?insufficent=2000");
                exit();
            }
        }
        else if (isset($_POST['voucher_50']))
        {
            if ($point > 3500)
            {
                $newpoints = $point - 3500;
                $SQL = "UPDATE users SET Points = '$newpoints' WHERE ID = '$UID'";
                $result = mysqli_query($conn, $SQL);
            }
            else
            {
                header("Location: ../rewards.php?insufficent=3500");
                exit();
            }
        }
        else if (isset($_POST['voucher_100']))
        {
            if ($point > 5000)
            {
                $newpoints = $point - 5000;
                $SQL = "UPDATE users SET Points = '$newpoints' WHERE ID = '$UID'";
                $result = mysqli_query($conn, $SQL);
            }
            else
            {
                header("Location: ../rewards.php?insufficent=5000");
                exit();
            }
        }
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recircle Team 81</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" 
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<!-- this page includes about us, how to recycle using our website, what we collect -->
<body>
    <!-- nav bar -->
    <div class = "container-nav">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/index.php"><i class="fa-solid fa-recycle"></i> ReCircle</a>
                <!-- extend button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./locateUs.php">Locate Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./rewards.php">Rewards</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./faqs.php">FAQs</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i>   
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./login.php">Login</a></li>
                                <li><a class="dropdown-item" href="./register.php">Register</a></li>
                            </ul>
                            
                        </li>
    
                    </ul>
    <!-- end of nav bar -->
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <h1>Rewards</h1>
    <h3> Use your points to redeem vouchers! </h3>
    <?php 
        echo '<h4>Hi '.$name.'</h4>';
        echo '<p class="">You have '.$point. 'points</p>';
        if (isset($_POST['voucher_10']))
        {
            echo '<p class="">You have redeemed a $10 voucher</p>';
            echo 'Voucher code is: '. rand(10000000,999999999999);
        }
        else if (isset($_POST['voucher_25']))
        {
            echo '<p class="">You have redeemed a $25 voucher</p>';
            echo 'Voucher code is: '. rand(10000000,999999999999);
        }
        else if (isset($_POST['voucher_50']))
        {
            echo '<p class="">You have redeemed a $50 voucher</p>';
            echo 'Voucher code is: '. rand(10000000,999999999999);
        }
        else if (isset($_POST['voucher_100']))
        {
            echo '<p class="">You have redeemed a $100 voucher</p>';
            echo 'Voucher code is: '. rand(10000000,999999999999);
        }
    ?>
    
    <form id="form_voucher" name="form_voucher" method="post" action="rewards.php">
            <label for="10">1000 points for $10 voucher</label>
            <br>
            <button type="submit" name="voucher_10">Redeem</button>
        <p>
            <label for="25">2000 points for $25 voucher</label>
            <br>
            <button type="submit" name="voucher_25">Redeem</button>
       <p>
            <label for="50">3500 points for $50 voucher</label>
            <br>
            <button type="submit" name="voucher_50">Redeem</button>
       <p>
            <label for="100">5000 points for $100 voucher</label>
            <br>
            <button type="submit" name="voucher_100">Redeem</button>
    </form>
    
</body>

</html>
