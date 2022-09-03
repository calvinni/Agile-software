<?php session_start(); ?>
<!doctype html>
<html lang="en">
<?php
require 'dbh.php';
if ($_SESSION['loggedin'] !== true)
{
  header("Location: ../login.php");
}
$UID = $_SESSION['userId'];
$CART = "SELECT * from cart where cart_id = '$UID';";
$Query = mysqli_query($conn, $CART);
$resultCheck = mysqli_num_rows($Query);

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
                
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-user"></i> View More   
                      </a>
                      <ul class="dropdown-menu">
                        <!-- hidden links -->
                          <?php 
                              if(isset($_SESSION['userId']))
                              {
                                echo '<li><a class="dropdown-item" href="./logout.php">Logout</a></li>';
                              }
                              else 
                              {
                                echo '<li><a class="dropdown-item" href="./login.php">Login</a></li>';
                              }
                              ?>
                          <?php 
                              if(isset($_SESSION['userId']))
                              {
                                echo 
                              '<li><a class="dropdown-item" href="./profile.php">Profile</a></li>
                              <li><a class="dropdown-item" href="./cart.php">Recycle bins</a></li>
                              <li><a class="dropdown-item" href="./history.php">Recycle history</a></li>
                              ';
                              }
                              else
                              {
                                echo '<li><a class="dropdown-item" href="./register.php">Register</a></li>';
                              }
                              ?>
                      </ul>
                  </li>  
              </ul>
        </div>
      </div>
    </nav>
  </div>
  <!-- end of nav bar -->
    <h1></h1>
<?php 
if ($resultCheck > 0)
{
?>
  <div class="table_box table_min table_max">
    <div class = "container">
        <h3>Recycle Bin</h3>
        <table class ='table table-bordered'>
        <tr>
            <th>Recyclable</th>
            <th>Quantity(In kg)</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
<?php 
    While ( $CART_DETAILS = mysqli_fetch_assoc($Query)  ) 
    { ?>  
        <tr>
          <form id="editForm" action="changecart.php" method="POST" target="_self">
            <td><?php echo $CART_DETAILS['OrderName']; ?></td>
            <td><?php echo $CART_DETAILS['OrderQuantity']; ?></td>
            <td>
                <button class="button button_max" type="submit" name="edit">Edit</button>
            </td>
            <td>
                <button class="button button_max" type="submit" name="delete">Delete</button>
            </td>
                <input type="hidden" id="OrderName" name="OrderName" value="<?php echo $CART_DETAILS['OrderName']; ?>">
                <input type="hidden" id="OrderQuantity" name="OrderQuantity" value="<?php echo $CART_DETAILS['OrderQuantity']; ?>">
                <input type="hidden" id="I_D" name="I_D" value="<?php echo $CART_DETAILS['ID']; ?>">
          </form>
        </tr>
<?php } ?>
    </table>
      <form id="itemForm" action="checkout.php" method="POST" target="_self">

        <button class="button button_min" type="submit" name="pickup">self pickup</button>
      </form>
    <br>
    <button onclick="myFunction()">Book pick up service</button>
    <!-- RESERVATION FORM -->
    <div id="booking" style="display:none;" >
    <table class='table table-bordered'  >
      <h4>Pick up service booking</h4>
      <form id="resForm" action="checkout.php" method="POST" target="_self">
        <tr>
          <td><label for="res_name">Name</label></td>
          <td><input type="text" required id="name" name="name" placeholder="John"/></td>
        </tr>
        <tr>
          <td><label for="res_email">Email</label></td>
          <td><input type="email" required id="email" name="email" placeholder="john@abc.com"/></td>
        </tr>
        <tr>
          <td><label for="res_tel">Mobile Number</label></td>
          <td><input type="number" required id="tel" name="tel" placeholder="12345678"/></td>
        </tr>
        <tr>
          <td><label for="res_notes">Notes (if any)</label></td>
          <td><input type="text" id="notes" name="notes"/></td>
        </tr>

          <?php
          $mindate = date("Y-m-d");
          ?>
        <tr>
          <td><label>Reservation Date</label></td>
          <td><input type="date" required id="res_date" name="res_date" min="<?=$mindate?>"></td>
        </tr>
        <tr>
          <td><label>Booking Slot</label></td>
          <td><select id="slot" name="slot">
                <option value="8am">8am</option>
                <option value="10am">10am</option>
                <option value="12pm">12pm</option>
                <option value="2pm">2pm</option>
                <option value="4pm">4pm</option>
              </select>
          </td>
        </tr>  
      </table>
          <input type="hidden" id="UID" name="UID" value="<?php echo $UID; ?>">
          <button class="button button_min" type="submit" name="checkout">Checkout</button>
        </form>
    </div>    
  <?php } 
        else
        {
          if(isset($_GET['checkout']))
            {
              if($_GET['checkout'] == "success")
              {
                echo '<h3 style="text-align: center;">Order recived, we will see you soon!</h3>';
              }
            }
            else
            {
              echo '<h3 style="text-align: center;">The cart is empty</br>Please go to order and add some recycleables</h3>';
            }
        }
        ?>
        <?php
            if(isset($_GET['editing']))
            {
              if($_GET['editing'] == "success")
              {
                echo '<p class="">Edit recived</p>';
              }
              else if($_GET['editing'] == "failure")
              {
                echo '<p class="">Editing failed, Please try again</p>';
              }
            }
            else if(isset($_GET['delete']))
            {
              if($_GET['delete'] == "success")
              {
                echo '<p class="">Delete successful!</p>';
              }
              else if($_GET['delete'] == "failure")
              {
                echo '<p class="">Deleting failed, Please try again</p>';
              }
            }
            else if(isset($_GET['fail']))
            {
              echo '<p class="">Order failed, Please check your internet connection</p>';
            }
            
        ?>
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

    <!-- bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script>
      function myFunction() {
        var x = document.getElementById("booking");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }
    </script>
</body>
</html>