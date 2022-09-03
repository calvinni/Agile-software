<?php

if (isset($_POST["Edit_submit"])) //checking if came here from click submit
{
    require 'dbh.php';  //using the $conn variable

    //storing input values from html submit
    $username = $_POST['username'];  
    $mobile = $_POST['contact'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['confpw'];
    $UserID = $_POST['UID'];

    if ($password !== $passwordRepeat) //checks if password valid
    {
        header("Location: ../profile.php?error=passwordinvalid"); 
        exit();
    }
    else //initialize db statement / select db values
    {
        $sql_check = " SELECT * FROM users where Username=?; ";  //prepare for every new SQL statement (?) here it's SELECT
        $stmt = mysqli_stmt_init($conn);                //prepare statement; prepping the database $conn (stmnt = statement)
        if (!mysqli_stmt_prepare($stmt, $sql_check))
        {
            header("Location: ../profile?error=sqlerror"); //checks if statement prepare failed
            exit();
        }
        else //checking if mobile already exists in database's 'users' table
        {
            mysqli_stmt_bind_param($stmt, "d", $mobile);  //add s if more than one string; one string because mobile=? has one '?'. Binding email to stmt
            mysqli_stmt_execute($stmt);                   //executing statement into database, will run email inside database for a match
            mysqli_stmt_store_result($stmt);                //stores the result we got from database in stmt
            $resultCheck = mysqli_stmt_num_rows($stmt);    //nb of rows matched, should be 0 or 1
            if($resultCheck > 0) 
            {
                header("Location: ../profile.php?error=mobile"); //checks if duplicate mobile number exist
                exit();
            }
            else //if no duplicate email above, we insert the new info into database
            {
                $sql_update = "UPDATE users SET Username = ?, Mobile = ?, Password = ? WHERE ID = ? "; //new SQL statement UPDATE
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql_update))
                {
                    header("Location: ../profile.php?error=sqlerror2"); //checks if statement prepare failed
                    exit();
                }
                else
                {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);              //hasing password (security: if hacker gets in db he'll see all the pw)
                    mysqli_stmt_bind_param($stmt, "sssd", $username, $mobile, $hashedPwd, $UserID); //variables inserting
                    mysqli_stmt_execute($stmt);
                    if (mysqli_affected_rows($conn) < 1)    // if insert fail, return to profile
                    {
                        header("Location: ../profile.php?edit=failure");
                        exit();
                    }
                    else
                    {
                        header("Location: ../profile.php?edit=success");
                        exit();
                    }
                }
            }
        }
    }
    mysqli_stmt_close($stmt); //closing statement
    mysqli_close($conn); //closing db connection
}
else
{
    header("Location: ../profile.php"); //if user didnt come from 'submit', return to profile
    exit();
}

?>

