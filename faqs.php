<?php session_start(); ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" 
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styling.css">
</head>

<!-- This is the FAQ page -->
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
                            <a class="nav-link" href="./startRecycle.php">Start Recycle!</a>
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
                                echo '<li class="nav-item">
                                          <a class="nav-link" href="./profile.php">View Profile</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="./order.php">Order</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="./cart.php">Cart</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link" href="./history.php">History</a>
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
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- end of nav bar -->

<!-- Main Content -->
<section class="faqsection"> 
    <h2 class="title">FAQs</h2>  

    <!-- First Question   -->
    <div class ="faq">
        <div class="qns"> 
            <h3> What does our application do? </h3>
            <svg width="15" height="10" viewbox=" 0 0 42 25">
                <!-- path d: arrow shape -->
                <path d="M3 3L20 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="ans">
            <p> ReCircle is a web application for the residents of Singapore to redeem supermarket vouchers 
            for recycling and apply for recyclable pick up services by our Recircle volunteers. </p>
        </div>
    </div>

    <!-- Second Question   -->
    <div class ="faq">
        <div class="qns"> 
            <h3> How can I redeem the vouchers? </h3>
            <svg width="15" height="10" viewbox=" 0 0 42 25">
                <!-- path d: arrow shape -->
                <path d="M3 3L20 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="ans">
            <p>After logging in, select the type of recyclables and the quantity you will be recycling. 
            Check that the correct items have been added to your cart under the Cart page and fill out the form before checking out. 
            Points will be updated once the recyclables have been collected and recycled into the recyling machine successfully. 
            Vouchers can be redeemed if you have accumulated enough points. Click here to <a href= "login.php">Login<a>.
            If you do not have an account yet, <a href="register.php">sign up now!</a></p>
        </div>
    </div>
    

    <!-- Third Question   -->
    <div class ="faq">
        <div class="qns"> 
            <h3> Can vouchers be exchanged for cash? </h3>
            <svg width="15" height="10" viewbox=" 0 0 42 25">
                <!-- path d: arrow shape -->
                <path d="M3 3L20 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="ans">
            <p>
                This voucher is not refundable or exchangeable for cash and any unused balance will not be refunded. <br>
                This voucher is not legal tender and cannot be deposited into any bank account. <br>
            </p>
        </div>
    </div>

    <!-- Fourth Question   -->
    <div class ="faq">
        <div class="qns"> 
            <h3> I am facing a technical issue. What should I do?</h3>
            <svg width="15" height="10" viewbox=" 0 0 42 25">
                <!-- path d: arrow shape -->
                <path d="M3 3L20 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="ans">
            <p>Check out the Locate Us page for a detailed list of contact information which includes our 24h hotline. </p>
        </div>
    </div>

    <!-- Fifth Question   -->
    <div class ="faq">
        <div class="qns"> 
            <h3>I misplaced my voucher. Can I redeem it again?</h3>
            <svg width="15" height="10" viewbox=" 0 0 42 25">
                <!-- path d: arrow shape -->
                <path d="M3 3L20 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="ans">
            <p>Do drop us an email and we will get back to you within 2 working days.</p>
        </div>
    </div>                                
</section>
</body>

<!-- Start of Footer -->
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
      <a href="https://www.facebook.com/" class="me-4 link-grayish">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://twitter.com/" class="me-4 link-grayish">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="https://www.instagram.com/" class="me-4 link-grayish">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="https://github.com/YangTing-work/ReCircle" class="me-4 link-grayish">
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
            Let's start Recycling!
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
            <a href="./faqs.php" class="text-reset">FAQs</a>
          </p>
          <p>
            <a href="./rewards.php" class="text-reset">Rewards</a>
          </p>
          <p>
            <a href="./register.php" class="text-reset">Register</a>
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
    ?? 2022 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">ReCircle.com.sg</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
    <!-- bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="faq.js"></script>

</html>