<?php

if (isset($_POST["signup_submit"])) //checking if came here from click submit
{
    require 'dbh.php';  //using the $conn variable

    //storing input values from html submit
    $username = $_POST['username'];  
    $mobile = $_POST['contact'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['confpw'];

    if ($password !== $passwordRepeat) //checks if password valid
    {
        header("Location: ../register.php?error=passwordinvalid"); 
        exit();
    }
    else //initialize db statement / select db values
    {
        $sql = " SELECT * FROM users where Username=?; ";  //prepare for every new SQL statement (?) here it's SELECT
        $stmt = mysqli_stmt_init($conn);                //prepare statement; prepping the database $conn (stmnt = statement)
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../register?error=sqlerror"); //checks if statement prepare failed
            exit();
        }
        else //checking if mobile already exists in database's 'users' table
        {
            mysqli_stmt_bind_param($stmt, "d", $mobile);  //add s if more than one string; one string because emailUsers=? has one '?'. Binding email to stmt
            mysqli_stmt_execute($stmt);                   
            mysqli_stmt_store_result($stmt); //stores the result we got from database in stmt
            $resultCheck = mysqli_stmt_num_rows($stmt);    //nb of rows matched, should be 0 or 1
            echo $resultCheck;
        //     if($resultCheck > 0) 
        //     {
        //         header("Location: ../register.php?error=usertaken&mobile=".$mobile); //checks if duplicate mobile number exist
        //         exit();
        //     }
        //     else //if no duplicate mobile above, we insert the new info into database
        //     {
        //         $sql = " INSERT INTO users (Username, Mobile, Password) VALUES (?, ?, ?) "; //new SQL statement INSERT
        //         $stmt = mysqli_stmt_init($conn);
        //         if(!mysqli_stmt_prepare($stmt, $sql))
        //         {
        //             header("Location: ../register.php?error=sqlerror2"); //checks if statement prepare failed
        //             exit();
        //         }
        //         else
        //         {
        //             $hashedPwd = password_hash($password, PASSWORD_DEFAULT);              //hasing password (security: if hacker gets in db he'll see all the pw)
        //             mysqli_stmt_bind_param($stmt, "sds", $username, $mobile, $hashedPwd); //variables inserting
        //             mysqli_stmt_execute($stmt);
        //             header("Location: ../register.php?signup=success");
        //             exit();
        //         }
        //     }
        // }
    }
    mysqli_stmt_close($stmt); //closing statement
    mysqli_close($conn); //closing db connection
}
else
{
    header("Location: ../register.php"); //if user didnt come from 'submit', return to sign up
    exit();
}

?>
