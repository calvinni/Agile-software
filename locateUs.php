<!-- References 
https://recyclensave.sg/locations/?term=east&type= 
https://www.w3schools.com/howto/howto_css_dropdown.asp -->


<?php session_start(); ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locate Us</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" 
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font -->
   <link href= "https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel='stylesheet' type='text/css'>
    <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
            .center {
                text-align: center;
                width: 100%;
            }
            h1{
                text-align: center;
                padding:50px;
                font-size: 35px;
                font-family: "Quicksand", sans-serif;
            }
            h3{
                text-align: center;
                padding: 20px;
                font-size: 80px;
                font-family: "Quicksand", sans-serif;
            }
            p{
                text-align: center;
                font-size: 20px;
                font-family: "Quicksand", sans-serif;
            }
            .dropbtn {
            background-color: #006633;
            width:100%;
            color: white;
            padding: 16px;
            font-size: 30px;
            text-align: left;
            border: none;
            cursor: pointer;
            font-family: "Quicksand", sans-serif;
            }

            .dropbtn:hover, .dropbtn:focus {
            background-color: #00994C;
            }

            .dropdown {
            position: relative;
            display: inline-block;
            width: 100%;
            padding: 2px;
            }

            .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            font-family: "Quicksand", sans-serif;
            font-size: 25px;
            }

            .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            }

            .dropdown a:hover {background-color: #ddd;}

            .show {display: block;}
    </style>
</head>


<!-- This page includes our addresses, contact information and social media handles -->
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
                        
                        <?php 
                                if(isset($_SESSION['userId']))
                                {
                                    $name = $_SESSION['userName'];
                                    echo '<li class="nav-item">
                                            <div class="nav-link">Hi '.$name.'</div>
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

    <!-- Main sign -->
    <div class="container-main">
        <div class="row">
        <h3><b>Our Recycling Machines</b></h3>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-sm" >
            
                <!-- LOCATIONS -->
                <i class="fa-solid fa-location-dot fa-8x center"></i>
                <br>
                <h1> Locations </h1>

                    <!-- dropdown list of addresses by region  -->
                    <!-- North -->
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn"><b>North</b></button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="#home"><b>BISHAN SPORTS CENTRE </b><br> 
                                            5 Bishan Street 14, Singapore 579783 <br>
                                            Sport Centre Drop Off Lobby</a>
                            <a href="#about"> <b>HOUGANG SPORTS CENTRE </b> <br>
                                            100 Hougang Avenue 2, Singapore 538856 <br>
                                            At entrance to Stadium</a>
                            <a href="#contact"> <b> JUNCTION 8 </b> <br>  
                                                9 Bishan Pl, Singapore 579837 <br>
                                                L1 External Walkway facing Library</a>
                            <a href="#contact"><b>SENGKANG SPORTS CENTRE</b> <br>
                                                    57 Anchorvale Rd, Singapore 544964 <br>
                                                    L1 (facing Anchorvale Road)</a>
                        </div>
                    </div>

                    <br>
                    
                    <!-- South -->
                    <div class="dropdown">
                        <button onclick="myFunction2()" class="dropbtn"><b>South</b></button>
                        <div id="myDropdown2" class="dropdown-content">
                            <a href="#contact"><b>RESORTS WORLD SENTOSA</b> <br>  
                                                    8 Sentosa Gateway, Singapore 098269 <br>
                                                    Universal Circle Level 1, outside Garrett's Popcorn</a>
                            <a href="#contact"><b>SENTOSA COVE VILLAGE</b> <br>
                                                    1 Cove Ave, Sentosa Arrival Plaza, Singapore 098537 <br>
                                                Near Cold Storage Sentosa Cove Village trolley return bay)</a>
                            <a href="#contact"><b>VIVOCITY</b> <br>
                                                    1 HarbourFront Walk, Singapore 098585 <br>
                                                    B1, near Fairprice xTRA</a>

                        </div>
                    </div>

                    <br>

                    <!-- East -->
                    <div class="dropdown">
                        <button onclick="myFunction3()" class="dropbtn"><b>East</b></button>
                        <div id="myDropdown3" class="dropdown-content">
                            <a href="#home"><b>GEYLANG BAHRU BLK 68 </b><br> 
                                                Blk 68 Geylang Bahru Singapore 330068<br>
                                                Void deck next to 7-11 Store</a>
                            <a href="#about"> <b>HOUGANG SPORTS CENTRE </b> <br>
                                                100 Hougang Avenue 2, Singapore 538856 <br>
                                                At entrance to Stadium</a>
                            <a href="#contact"> <b> GEYLANG EAST SWIMMING COMPLEX </b> <br>  
                                                    601 Aljunied Ave 1, Singapore 389862 <br>
                                                    At entrance to swimming complex</a>
                            <a href="#contact"><b>HEARTBEAT @ BEDOK</b> <br>
                                                11 Bedok North Street 1 Singapore 469662 <br>
                                                Level 1 beside Lift Lobby B</a>
                            <a href="#contact"><b>TAMPINES BLK 478</b> <br>
                                                Blk 478 Tampines St 44, Singapore 520478 <br>
                                                Public walkway between Koufu (#01-221) and myCK Dept Store (#01-119)</a>
                        </div>
                    </div>
                    
                    <br>

                    <!-- West -->
                    <div class="dropdown">
                        <button onclick="myFunction4()" class="dropbtn"><b>West</b></button>
                        <div id="myDropdown4" class="dropdown-content">
                            <a href="#home"> <b>ASCENT</b> <br> 
                            2 SCIENCE PARK DRIVE 118222<br>
                            Level 1 Retail Lift Lobby</a>
                            <a href="#about"> <b>BUKIT GOMBAK SPORTS CENTRE </b> <br>
                            810 Bukit Batok West Ave 5, Singapore 659088 <br>
                            L1 near Staircase A</a>
                            <a href="#contact"> <b> GALAXIS </b> <br>  
                            1 Fusionopolis Place, Singapore 138522 <br>
                            Level 1 Retail Walkway near escalator</a>
                            <a href="#contact"><b>HONG KAH NORTH COMMUNITY CLUB</b> <br>
                            30 Bukit Batok Street 31, Singapore 659440 <br>
                            Level 1 beside Lift Lobby B</a>
                            <a href="#contact"><b>TAMPINES BLK 478</b> <br>
                            Blk 478 Tampines St 44, Singapore 520478 <br>
                            Public walkway between Koufu (#01-221) and myCK Dept Store (#01-119)</a>
                        </div>
                    </div>
                </div>

                <script>
                    /* When the user clicks on the button, 
                    toggle between hiding and showing the dropdown content */
                    function myFunction() {
                    document.getElementById("myDropdown").classList.toggle("show");
                    }
                    function myFunction2() {
                    document.getElementById("myDropdown2").classList.toggle("show");
                    }
                    function myFunction3() {
                    document.getElementById("myDropdown3").classList.toggle("show");
                    }
                    function myFunction4() {
                    document.getElementById("myDropdown4").classList.toggle("show");
                    }

                    // Close the dropdown if the user clicks somewehere else
                    window.onclick = function(event) {
                        if (!event.target.matches('.dropbtn')) {
                            var dropdowns = document.getElementsByClassName("dropdown-content");
                            var i;
                            for (i = 0; i < dropdowns.length; i++) {
                            var openDropdown = dropdowns[i];
                            if (openDropdown.classList.contains('show')) {
                                openDropdown.classList.remove('show');
                            }
                            }
                        }
                    }
                </script>
            </div>
        </div>
    </div>
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
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">ReCircle.com.sg</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
    
</body>
<!-- bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>