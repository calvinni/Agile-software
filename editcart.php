<?php
if (isset($_POST["Editing"])) //checking if came here from click submit
{
    require 'dbh.php';  //using the $conn variable

    //storing input values from html submit
    $New_OrderName = $_POST['OrderName'];  
    $New_OrderQuantity = $_POST['OrderQuantity'];
    $userID = $_POST['userID'];

    $SQL = "UPDATE cart SET OrderName = '$New_OrderName', OrderQuantity = '$New_OrderQuantity' WHERE ID = '$userID'";
    $result = mysqli_query($conn, $SQL);
    if (mysqli_affected_rows($conn) > 0)
    {
        header("Location: ../cart.php?editing=success");
        exit();
    }
    else
    {
        header("Location: ../cart.php?editing=failure");
        exit();
    }
}
else
{
    header("Location: ../cart.php"); //if user didnt come from 'submit', return to cart
    exit();
}

?>

