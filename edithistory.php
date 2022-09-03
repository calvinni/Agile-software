<?php
require 'dbh.php';  //using the $conn variable

if (isset($_POST["Editing_List"])) //checking if came here from click submit
{
    //storing input values from html submit
    $Update_name = $_POST['name'];
    $Update_email = $_POST['email'];
    $Update_phone = $_POST['tel'];
    $Update_notes = $_POST['notes'];
    $Update_date = $_POST['res_date'];
    $Update_time = $_POST['slot'];
    $Update_status = $_POST['status'];
    $Update_listID = $_POST['listID'];

    $List_SQL = "UPDATE orderlist SET name = '$Update_name', 
                                 email = '$Update_email', 
                                 mobile = '$Update_phone', 
                                 notes = '$Update_notes', 
                                 date = '$Update_date', 
                                 time = '$Update_time',
                                 status  = '$Update_status'
                                 WHERE ID = '$Update_listID'";
    $result = mysqli_query($conn, $List_SQL);
    if (mysqli_affected_rows($conn) > 0)
    {
        header("Location: ../history.php?editing=success");
        exit();
    }
    else
    {
        header("Location: ../history.php?editing=failure");
        exit();
    }
}
else if (isset($_POST["Editing_Items"])) //checking if came here from click submit
{
    //storing input values from html submit
    $Update_OrderName = $_POST['OrderName'];  
    $Update_OrderQuantity = $_POST['OrderQuantity'];
    $Update_itemID = $_POST['itemID'];
    $Update_itype = $_POST['itemtype'];
    $Update_istatus = $_POST['status'];

    $Items_SQL = "UPDATE orderitems SET OrderName = '$Update_OrderName', 
                                        OrderQuantity = '$Update_OrderQuantity',
                                        type = '$Update_itype',
                                        status = '$Update_istatus',
                                        WHERE ID = '$Update_itemID'";
    $result = mysqli_query($conn, $Items_SQL);
    if (mysqli_affected_rows($conn) > 0)
    {
        header("Location: ../history.php?editing=success");
        exit();
    }
    else
    {
        header("Location: ../history.php?editing=failure");
        exit();
    }
}
else
{
    header("Location: ../history.php"); //if user didnt come from 'submit', return to history
    exit();
}

?>

