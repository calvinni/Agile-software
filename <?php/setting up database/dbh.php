<?php
//setting up database

//local connection: 
 $servername = "localhost";
 $dbUsername = "root";
 $dbPassword = "";
 $dbName = "useraccounts";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$conn)
{
    die("Connection failed: ".mysqli_connect_error());
}
