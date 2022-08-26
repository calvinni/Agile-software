<?php

if(isset($_POST['login_submit'])) //checking if user got here from submit button and not from URL
{
    require 'dbh.php';

    $mobile = $_POST['LoginMobile'];
    $password = $_POST['loginPass'];

    if(empty($mobile) || empty($password))
    {
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    else 
    {
        $sql = "SELECT * FROM users WHERE Mobile=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) //checking if $sql is good to go with $stmt, prepare statement
        { 
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else //grab info we got from $sql
        { 
            mysqli_stmt_bind_param($stmt, "d", $mobile); //include statement that we want to send ($stmt) + tell what kind of data sent + actual data to bind
    
            mysqli_stmt_execute($stmt); //executing previous params
    
            $result = mysqli_stmt_get_result($stmt); //info we got from db are now in $result (matches?)
    
            if($row = mysqli_fetch_assoc($result))//storing $result into an associative array to allow php manipulation
            {
                $pwdCheck = password_verify($password, $row['Password']); //checking if user entered pwd is same as the one in db. (will hash the user input pwd prior)
        
                if($pwdCheck == false)
                {
                    //echo $mobile;   //testing purpose
                    //echo $password; //testing purpose
                    //echo $row['Password']; //testing purpose
                    //var_dump($row); //testing purpose
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                }
                else if($pwdCheck == true) //we want lock in user if success login: need session, global variable that has info of user.
                {
                    session_start();
                    $_SESSION['userId'] = $row['ID'];
                    $_SESSION['userName'] = $row['Username'];
                    $_SESSION['loggedin'] = true;
                    header("Location: ../index.php?login=success");
                    exit();
                }
                else
                {
                    //echo $mobile;   //testing purpose
                    //echo $password; //testing purpose
                    header("Location: ../login.php?error=wrongpwd");
                    exit();
                }
            }
            else //if $result is empty
            {
                header("Location: ../login.php?error=emailDNE");
                exit();
            }
    }
}
}
else {
    header("Location: ../login.php");
    exit();
}

?>
