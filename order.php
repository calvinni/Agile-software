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
        <h1>Login to ReCircle</h1>
        <!-- pull the data from sql -->
        <form action="includes/dbh.php" method="POST">
            <p>Key in the recycle items name that need to be added.</p>
            <input id="OrderName" name="OrderName" placeholder="OrderName" type="text" required>
            </br>
            <p>Key in the quantity in KG that need to be added.</p>
            <input id="OrderQuantity" name="OrderQuantity" placeholder="OrderQuantity" type="text" required>
            </br>
            <input type="submit">
        </form>
        <!-- End Of sql -->
    </section>

</body>

</html>