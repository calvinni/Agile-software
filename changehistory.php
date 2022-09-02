<?php session_start(); 
if ($_SESSION['loggedin'] !== true) // check if user came from history and is logged in and is an admin
{
  header("Location: ../login.php");
}
else if ($_SESSION['userRole'] !== 'Admin')
{
  header("Location: ../history.php");
}

if (isset($_POST["List_edit"]) or isset($_POST["List_delete"])) //checking if came here from click submit
{
    $History_listID = $_POST['H_ID'];
    $History_name = $_POST['H_name'];
    $History_email = $_POST['H_email'];
    $History_mobile = $_POST['H_mobile'];
    $History_notes = $_POST['H_notes'];
    $History_date = $_POST['H_date'];
    $History_time = $_POST['H_time'];
    $History_status = $_POST['H_status'];
}
else if (isset($_POST["Item_edit"]) or isset($_POST["Item_delete"])) //checking if came here from click submit
{
    $History_itemid = $_POST['H_id'];
    $History_OrderName = $_POST['H_OrderName'];
    $History_OrderQuantity = $_POST['H_OrderQuantity'];
}
else
{
    header("Location: ../history.php"); //if user didnt come from 'submit', return to history
    exit();
}

require 'dbh.php';  //using the $conn variable

?>
<!DOCTYPE html>

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
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- end of nav bar -->
<?php
if (isset($_POST["List_edit"])) 
{
?>
<h1>Edit Booking</h1>
<div class="table_box table_min table_max">
    <div class = "container">
        <!-- RESERVATION FORM -->
        <table class='table table-bordered'>
        <form id="resForm" action="edithistory.php" method="POST" target="_self">
            <h4>Edit your booking here</h4>
            <tr>
            <td><label for="res_name">Name</label></td>
            <td><input type="text" required id="name" name="name" value="<?php echo $History_name; ?>"/></td>
            </tr>
            <tr>
            <td><label for="res_email">Email</label></td>
            <td><input type="email" required id="email" name="email" value="<?php echo $History_email; ?>"/></td>
            </tr>
            <tr>
            <td><label for="res_tel">Mobile Number</label></td>
            <td><input type="number" required id="tel" name="tel" value="<?php echo $History_mobile; ?>"/></td>
            </tr>
            <tr>
            <td><label for="res_notes">Notes (if any)</label></td>
            <td><input type="text" id="notes" name="notes" value="<?php echo $History_notes; ?>"/></td>
            </tr>

            <?php
            $mindate = date("Y-m-d");
            ?>
            <tr>
            <td><label>Reservation Date</label></td>
            <td><input type="date" required id="res_date" name="res_date" min="<?=$mindate?>" value="<?php echo $History_date; ?>"></td>
            </tr>
            <tr>
            <td><label>Booking Slot</label></td>
            <td><select id="slot" name="slot">
                    <option value="8am" <?php if ($History_time == '8am') {echo 'selected';}?>>8am</option>
                    <option value="10am" <?php if ($History_time == '10am') {echo 'selected';}?>>10am</option>
                    <option value="12pm" <?php if ($History_time == '12pm') {echo 'selected';}?> >12pm</option>
                    <option value="2pm" <?php if ($History_time == '2pm') {echo 'selected';}?> >2pm</option>
                    <option value="4pm" <?php if ($History_time == '4pm') {echo 'selected';}?> >4pm</option>
                    <option value="6pm" <?php if ($History_time == '6pm') {echo 'selected';}?> >6pm</option>
                    <option value="8pm" <?php if ($History_time == '8pm') {echo 'selected';}?> >8pm</option>
                </select>
            </td>
            </tr>
            <tr>
            <td><label>Status</label></td>
            <td><input type="text" required id="status" name="status" value="<?php echo $History_status; ?>"/></td>
            </tr>  
        </table>
            <input type="hidden" id="listID" name="listID" value="<?php echo $History_listID; ?>">
            <button class="button button_min" type="submit" name="checkout">Checkout</button>
            </form>
    </div>
</div>
<?php
}
else if (isset($_POST["List_delete"])) 
{
    $list_delete = "DELETE FROM orderlist WHERE ID='$History_listID'";
    mysqli_query($conn, $list_delete);
    if (mysqli_affected_rows($conn) > 0)
    {
        header("Location: ../history.php?delete=success");
        exit();
    }
    else
    {
        header("Location: ../history.php?delete=failure");
        exit();
    }
}
else if (isset($_POST["Item_edit"])) 
{
?>
    <section>
    <h1>Edit item</h1>
    <div class="wrapper">
        <h2>Edit your item here</h2>
        <!-- Edit form -->
        <form action="edithistory.php" method="POST">
            <p>Key in the recycle items name that need to be edited.</p>
            <select id="OrderName" name="OrderName">
                <option value="paper" <?php if ($History_OrderName == 'paper') {echo 'selected';}?>>Paper</option>
                <option value="plastic" <?php if ($History_OrderName == 'plastic') {echo 'selected';}?>>Plastic</option>
                <option value="metal" <?php if ($History_OrderName == 'metal') {echo 'selected';}?>>Metal</option>
                <option value="glass" <?php if ($History_OrderName == 'glass') {echo 'selected';}?>>Glass</option>
            </select>
            <p>
            <p>Key in the quantity in KG that need to be edited.</p>
                <input id="OrderQuantity" name="OrderQuantity" type="number" value="<?php echo $History_OrderQuantity; ?>" required>
                <input type="hidden" id="itemID" name="itemID" value="<?php echo $History_itemid; ?>">
            <p></p>
            <button type="submit" name="Editing_H">Edit</button>
        </form>
        <!-- End Of Edit form -->
    </section>
  </div>
<?php
}
else if (isset($_POST["Item_delete"]))
{
    $item_delete = "DELETE FROM orderitems WHERE ID='$History_itemid'";
    mysqli_query($conn, $item_delete);
    if (mysqli_affected_rows($conn) > 0)
    {
        header("Location: ../history.php?delete=success");
        exit();
    }
    else
    {
        header("Location: ../history.php?delete=failure");
        exit();
    }
}
?>
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
</body>
</html>
