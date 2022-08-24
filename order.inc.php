<?php
    include_once 'dbh.php';

    $OrderName = $_POST['OrderName'];
    $OrderQuantity = $_POST['OrderQuantity'];

    $sql = "INSERT INTO users (OrderName, OrderQuantity) VALUES ('$OrderName', '$OrderQuantity');";
    mysqli_query($conn, $sql);

    header("Location: ../order.php?order=success");
?>