<?php
    require 'dbh.php';

    $UID = $_SESSION['userId'];
    $sql = "SELECT * FROM users WHERE ID = '$UID'";
    $Id = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($Id); 

    $OrderName = $_POST['OrderName'];
    $OrderQuantity = $_POST['OrderQuantity'];

    $sql = "INSERT INTO users (OrderName, OrderQuantity) VALUES ('$OrderName', '$OrderQuantity') WHERE ID = '$UID';";
    mysqli_query($conn, $sql);

    header("Location: ../order.php?order=success");
?>