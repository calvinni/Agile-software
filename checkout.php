<?php

if (isset($_POST["checkout"])) //checking if came here from click submit
{
    require 'dbh.php';  //using the $conn variable

    $UserID = $_POST['UID'];
    
    $Query = "DELETE FROM cart WHERE cart_id='$UID'";
    $result = mysqli_query($conn, $Query);

    header("Location: ../order.php?checkout=success");
}
else
{
    header("Location: ../order.php"); //if user didnt come from 'checkout', return to sign up
    exit();
}

?>
