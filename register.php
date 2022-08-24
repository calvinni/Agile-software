<?php session_start(); ?>
<!doctype html>
<html lang="en">

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
                            <a class="nav-link" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./locateUs.php">Locate Us</a>
                        </li>
                        <!-- hidden links -->
                        <?php 
                             if(isset($_SESSION['userId']))
                             {
                                echo '<li class="nav-item">
                                        <a class="nav-link" href="./rewards.php">Rewards</a>
                                       </li>
                                       <li class="nav-link">
                                        <li><a class="nav-link" href="./profile.php">View Profile</a></li>
                                       </li>
                                       <li class="nav-link">
                                        <li><a class="nav-link" href="./order.php">Order</a></li>
                                       </li>
                                       <li class="nav-link">
                                        <li><a class="nav-link" href="./cart.php">Cart</a></li>
                                       </li>';
                             }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./faqs.php">FAQs</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i>   
                            </a>
                            <ul class="dropdown-menu">
                                <?php 
                                    if(isset($_SESSION['userId']))
                                    {
                                      echo '<li><a class="dropdown-item" href="./logout.php">logout</a></li>';
                                    }
                                    else 
                                    {
                                      echo '<li><a class="dropdown-item" href="./login.php">Login</a></li>';
                                    }
                                    ?>
                                <li><a class="dropdown-item" href="./register.php">Register</a></li>
                            </ul>
                        </li>  
                        
                        <?php 
                                if(isset($_SESSION['userId']))
                                {
                                    $name = $_SESSION['userName'];
                                    echo '<li class="nav-item">
                                            <div class="nav-link">Hi '.$name.',<br>You are logged in!</div>
                                          </li>';
                                }
                        ?>
                      
                      </li>
                    </ul>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    
                </div>
            </div>
        </nav>
    </div>
    <!-- end of nav bar -->
    <section>
        <br>
     <h1>Register</h1>
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
    </section>
</body>

</html>