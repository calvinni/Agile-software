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
                            <a class="nav-link" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./locateUs.php">Locate Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./faqs.php">FAQs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./rewards.php">Rewards</a>
                        </li>
                        <!-- hidden links -->
                        <?php 
                             if(isset($_SESSION['userId']))
                             {
                                echo '<li class="nav-link">
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
<div class="table_box">
    <h1>Rewards</h1>
    <h3> Use your points to redeem vouchers! </h3>
    <?php 
        if ($_SESSION['loggedin'] == true)
        {
          echo '<h4>Hi '.$name.'</h4>';
          echo '<p class="">You have '.$point.' points</p>';
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
        }
        else
        {
          echo '<h4>Please login to access this feature</h4>';
        }
        
    ?>
  <table class ='table table-bordered'>
    <form id="form_voucher" name="form_voucher" method="post" action="rewards.php">
        <p>
          <tr>
            <td>
            <label for="10">1000 points for $10 voucher</label>
            <br>
            <?php 
            if ($_SESSION['loggedin'] == true)
            {
              echo '<button type="submit" name="voucher_10">Redeem</button>';
            }
            ?>
            </td>
        <p>
            <td>
            <label for="25">2000 points for $25 voucher</label>
            <br>
            <?php 
            if ($_SESSION['loggedin'] == true)
            {
              echo '<button type="submit" name="voucher_25">Redeem</button>';
            }
            ?>
            </td>
          </tr>
       <p>
          <tr>
            <td>
            <label for="50">3500 points for $50 voucher</label>
            <br>
            <?php 
            if ($_SESSION['loggedin'] == true)
            {
              echo '<button type="submit" name="voucher_50">Redeem</button>';
            }
            ?>
            </td>
       <p>
            <td>
            <label for="100">5000 points for $100 voucher</label>
            <br>
            <?php 
            if ($_SESSION['loggedin'] == true)
            {
              echo '<button type="submit" name="voucher_100">Redeem</button>';
            }
            ?>
            </td>
    </form>
  </table>
    <?php 
        if (isset($_GET['insufficent']))
        {
            echo '<p class="">You have insufficent points</p>';
        }
      ?>
</div>
    <p></p>
    <!-- Footer -->
<footer class="text-center text-lg-start bg-white text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 link-grayish">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 link-grayish">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 link-grayish">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 link-grayish">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
          <i class="fa-solid fa-recycle"></i>ReCircle
          </h6>
          <p>
            Let's start Recycle!
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Recycle
          </h6>
          <p>
            <a href="#!" class="text-reset">Bottles</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Can</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Glass</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Paper</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">FAQs</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Rewards</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Register</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3 text-grayish"></i> ABC 123 Road Singapore 123456 Singapore</p>
          <p>
            <i class="fas fa-envelope me-3 text-grayish"></i>
            recirclesg@example.com
          </p>
          <p><i class="fas fa-phone me-3 text-grayish"></i> + 65 1234 5678</p>
          <p><i class="fas fa-print me-3 text-grayish"></i> + 65 1234 5678</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">ReCircle.com.sg</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
   


    <!-- bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
      
    </script>
</body>

</html>