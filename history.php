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
$name = $_SESSION['userName'];
$role = $_SESSION['userRole'];

$new_id = $UID + 1;

if ($role == 'Admin')
{    
  $sql_list = "SELECT * from orderlist";
  $sql_items = "SELECT * from orderitems";
}
else
{
  $sql_list = "SELECT * from orderlist where cart_id = '$UID';";
  $sql_items = "SELECT * from orderitems where cart_id = '$new_id';";
}

$list = mysqli_query($conn, $sql_list);
$items = mysqli_query($conn, $sql_items);

$resultCheck = mysqli_num_rows($list);

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
    <h1>History</h1>
<?php 
if ($resultCheck > 0)
{
?>
  
  <div class = "container">
    <div class="table_box table_min table_max">
    <h3>Your orders, <?php echo $name; ?></h3>
        <p>This table contains info about your past checkouts</p>
        <p>Below table displays all orders made</p>
        <table class ='table table-bordered left_relative'>
        <tr>
            <th>Order ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Notes</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <?php 
              if ($role == 'Admin')
              { 
            ?> 
                <th>Edit</th>
                <th>Delete</th>
        <?php } ?>
        </tr>
<?php 
    While ( $LIST_DETAILS = mysqli_fetch_assoc($list)  ) 
    { ?>  
        <tr>
          <form id="ListForm" action="changehistory.php" method="POST" target="_self">
            <td><?php echo $LIST_DETAILS['ID']; ?></td>
            <td><?php echo $LIST_DETAILS['name']; ?></td>
            <td><?php echo $LIST_DETAILS['email']; ?></td>
            <td><?php echo $LIST_DETAILS['mobile']; ?></td>
            <td><?php echo $LIST_DETAILS['notes']; ?></td>
            <td><?php echo $LIST_DETAILS['date']; ?></td>
            <td><?php echo $LIST_DETAILS['time']; ?></td>
            <td><?php echo $LIST_DETAILS['status']; ?></td>
            <?php 
              if ($role == 'Admin')
              { 
            ?> 
            <td>
                <button class="button button_max" type="submit" name="List_edit">Edit</button>
            </td>
            <td>
                <button class="button button_max" type="submit" name="List_delete">Delete</button>
            </td>
                <input type="hidden" id="H_ID" name="H_ID" value="<?php echo $LIST_DETAILS['ID']; ?>">
                <input type="hidden" id="H_name" name="H_name" value="<?php echo $LIST_DETAILS['name']; ?>">
                <input type="hidden" id="H_email" name="H_email" value="<?php echo $LIST_DETAILS['email']; ?>">
                <input type="hidden" id="H_mobile" name="H_mobile" value="<?php echo $LIST_DETAILS['mobile']; ?>">
                <input type="hidden" id="H_notes" name="H_notes" value="<?php echo $LIST_DETAILS['notes']; ?>">
                <input type="hidden" id="H_date" name="H_date" value="<?php echo $LIST_DETAILS['date']; ?>">
                <input type="hidden" id="H_time" name="H_time" value="<?php echo $LIST_DETAILS['time']; ?>">
                <input type="hidden" id="H_status" name="H_status" value="<?php echo $LIST_DETAILS['status']; ?>">
        <?php } ?>
          </form>
        </tr>
<?php } ?>
    </table>
    </div>
    <br>
    <div class="table_box table_min table_max">
    <p>Below table shows the items allocated to each order, with Item ID linking to Order ID in the table above</p>
    <table class ='table table-bordered'>
      <tr>
        <th>Item ID</th>
        <th>OrderName</th>
        <th>OrderQuantity</th>
      <?php 
      if ($role == 'Admin')
      { 
        ?> 
        <th>Edit</th>
        <th>Delete</th>
<?php } ?>
      </tr>
      <?php 
        While ( $ITEMS_DETAILS = mysqli_fetch_assoc($items)  ) 
        { ?>
        <tr>
          <form id="ItemForm" action="changehistory.php" method="POST" target="_self">
            <td><?php echo $ITEMS_DETAILS['order_id']; ?></td>
            <td><?php echo $ITEMS_DETAILS['OrderName']; ?></td>
            <td><?php echo $ITEMS_DETAILS['OrderQuantity']; ?></td>
            <?php 
                if ($role == 'Admin')
                { 
              ?> 
              <td>
                  <button class="button button_max" type="submit" name="Item_edit">Edit</button>
              </td>
              <td>
                  <button class="button button_max" type="submit" name="Item_delete">Delete</button>
              </td>
                  <input type="hidden" id="H_id" name="H_id" value="<?php echo $ITEMS_DETAILS['ID']; ?>">
                  <input type="hidden" id="H_OrderName" name="H_OrderName" value="<?php echo $ITEMS_DETAILS['OrderName']; ?>">
                  <input type="hidden" id="H_OrderQuantity" name="H_OrderQuantity" value="<?php echo $ITEMS_DETAILS['OrderQuantity']; ?>">
          <?php } ?>
          </form>
        </tr>
  <?php } ?>
    </table>

  <?php } 
        else
        {
          echo '<h3 style="text-align: center;">Your history is empty</br>Please go to order and checkout some recycleables!</h3>';
        }
        ?>
        <?php
            if(isset($_GET['error']))
            {
              if($_GET['error'] == "sqlerror")
              {
                echo '<p class="">Error occured, please try again</p>';
              }
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
</body>
</html>