<?php
/*validates user input, checks if mobile already exists, inserts new input info into db*/

if (isset($_POST["checkout"])) //checking if came here from click submit
{
    require 'dbh.php';  //using the $conn variable

    //storing input values from html submit
    $UserID = $_POST['UID'];

    $SQL = "DELETE FROM cart WHERE cart_id = '$UID'";
    $result = mysqli_query($conn, $SQL);

    header("Location: ../order.php?checkout=success");
}
else
{
    header("Location: ../order.php"); //if user didnt come from 'submit', return to sign up
    exit();
}

?>
