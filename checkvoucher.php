<?php
require 'dbh.php';

$UID = $_SESSION['userId'];
$sql = "SELECT * FROM users WHERE `ID` = '$UID'";
$Id = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($Id); 
$point = $user['Points'];

  if (isset($_POST['voucher_10'])) //checking if user got here from redeem button and not from URL
  {
      if ($point > 1000)
      {
        $newpoints = $point - 1000
        $sql_ = "UPDATE users SET `Points` = '$newpoints'";
        $result = mysqli_query($conn, $sql_);
        echo $point;
      }
      else
      {
        header("Location: ../rewards.php?insufficent=1000");
        exit();
      }
  }
  else if (isset($_POST['voucher_25']))
  {
      header("Location: ../rewards.php?voucher=25");
      exit();
  }
  else if (isset($_POST['voucher_50']))
  {
      header("Location: ../rewards.php?voucher=50");
      exit();
  }
  else if (isset($_POST['voucher_100']))
  {
      header("Location: ../rewards.php?voucher=100");
      exit();
  }
  else
  {
      header("Location: ../rewards.php?wrongbutton");
      exit();
  }
}
?>
