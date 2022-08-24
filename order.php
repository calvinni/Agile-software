<?php session_start(); ?>
<!doctype html>
<html lang="en">
<?php 

require 'dbh.php';

$SQL = "SELECT * from cart as C join users as U on C.cart_id = U.ID where C.cart_id = '$UID';";
$Query = mysqli_query($conn, $SQL);
$resultCheck = mysqli_num_rows($Query);

if (isset($_POST['Ordering']))
{
    $UID = $_SESSION['userId'];
    $OrderName = $_POST['OrderName'];
    $OrderQuantity = $_POST['OrderQuantity'];
    $sql = "INSERT INTO cart (cart_id, OrderName, OrderQuantity) VALUES ('$UID', '$OrderName', '$OrderQuantity');";
    mysqli_query($conn, $sql);
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
        <h1>Order your recyclables here</h1>
        <!-- pull the data from sql -->
        <form action="order.php" method="POST">
            <p>Key in the recycle items name that need to be added.</p>
            <input id="OrderName" name="OrderName" placeholder="Type of recyclable" type="text" required>
            <p>
            <p>Key in the quantity in KG that need to be added.</p>
            <input id="OrderQuantity" name="OrderQuantity" placeholder="Quantity in KG" type="number" required>
            <p></p>
            <button type="submit" name="Ordering">Add to cart</button>
        </form>
        <!-- End Of sql -->
        <?php
          if (isset($_POST['Ordering'])) 
          {
            echo '<p class="">successfully added to cart</p>';
          }
        ?>
    </section>
<p>
<h4>Cart</h4>
<?php 
if ($resultCheck > 0)
{
?>
    <h4>Cart</h4>
    <table border="1" style="width:100%">
        <tr>
            <th>Recyclable</th>
            <th>Quantity</th>
        </tr>
<?php 
    While ( $CART_DETAILS = mysqli_fetch_assoc($Query)  ) 
    { ?>  
        <tr>
            <td><?php echo $CART_DETAILS['OrderName']; ?></td>
            <td><?php echo $CART_DETAILS['OrderQuantity']; ?></td>
        </tr>
    </table>
    <?php } 
} 
else
{
    echo '<p class="">The cart is empty</br>Please go to order and add some recycleables</p>';
}
?>

</body>

</html>