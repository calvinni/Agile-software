<?php

if(isset($_POST["checkout"])) //checking if came here from click submit
{
    require 'dbh.php';  //using the $conn variable

    $Order_name = $_POST['name'];
    $Order_email = $_POST['email'];
    $Order_phone = $_POST['tel'];
    $Order_notes = $_POST['notes'];
    $Order_date = $_POST['res_date'];
    $Order_time = $_POST['slot'];
    $UserID = $_POST['UID'];

    $Query = "INSERT INTO orderlist (cart_id, name, email, mobile, notes, date, time) 
                    VALUES 
                    ('$UserID', '$Order_name', '$Order_email', '$Order_phone', '$Order_notes', '$Order_date', '$Order_time');";  // Insert into table orderlist the booking variables
    mysqli_query($conn, $Query);
    if (mysqli_affected_rows($conn) < 1)    // if insert fail, return to cart
    {
        header("Location: ../cart.php?fail=list");
        exit();
    }
    else
    {
        $sql_orderid = "SELECT * FROM orderlist WHERE cart_id=? ORDER BY ID DESC"; // finds ID from orderlist to insert into orderlist
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql_orderid))
        {
            header("Location: ../cart.php?error=sqlerror"); //checks if statement prepare failed
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "d", $UserID);
            mysqli_stmt_execute($stmt); 
            $order_list = mysqli_stmt_get_result($stmt); 
            $list = mysqli_fetch_assoc($order_list);
            $list_id = $list['ID']; 

            $sql = "SELECT * FROM cart WHERE cart_id=?"; // Find all in the cart for this user
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: ../cart.php?error=sqlerror"); //checks if statement prepare failed
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "d", $UserID);
                mysqli_stmt_execute($stmt); 
                $result = mysqli_stmt_get_result($stmt); 

                While ($row = mysqli_fetch_assoc($result))  // Insert into table orderitems for each item
                {
                    $Cart_Name = $row['OrderName'];                   
                    $Cart_Quantity = $row['OrderQuantity'];
                    $new_id = $UserID + 1;
                    $sql_item = "INSERT INTO orderitems (order_id, cart_id, OrderName, OrderQuantity) VALUES ('$list_id', '$new_id', '$Cart_Name', '$Cart_Quantity');";
                    mysqli_query($conn, $sql_item);
                    if (mysqli_affected_rows($conn) < 1)    // if insert fail, return to cart
                    {
                        header("Location: ../cart.php?fail=items");
                        exit();
                    }

                    $Rounded_Quantity = round($Cart_Quantity);
                    $new_points = $Rounded_Quantity * 500;
                    $sql_points = "UPDATE users SET Points = Points + '$new_points' WHERE ID = '$UserID'";
                    $points = mysqli_query($conn, $SQL);
                    if (mysqli_affected_rows($conn) < 1)    // if insert fail, return to cart
                    {
                        header("Location: ../cart.php?fail=points");
                        exit();
                    }
                }    

                $delete = "DELETE FROM cart WHERE cart_id='$UserID'"; // Delete from the cart once inserted
                $result = mysqli_query($conn, $delete);

                header("Location: ../cart.php?checkout=success");
                exit();
            }

        }
    }
    
}
else
{
    header("Location: ../cart.php"); //if user didnt come from 'checkout', return to cart
    exit();
}

?>
