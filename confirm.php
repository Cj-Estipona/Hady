<?php
  include 'db_conn.php';
  date_default_timezone_set("Asia/Manila");



  if (!isset($_GET['email']) || !isset($_GET['token'])) {
    header('Location: sign_up.php');
    exit();
  } else {
    $email = $_GET['email'];
    $token = $_GET['token'];

    $queryCheck = "SELECT UserID FROM tbl_user WHERE Email='$email' AND Token = '$token' AND IsEmailConfirmed=0";
    $resultCheck = mysqli_query($connection1, $queryCheck) or die("Failed to query the query1 ".mysqli_error($connection1));
    $fetchRow = mysqli_fetch_array($resultCheck);
    $userID = $fetchRow['UserID'];

    if (mysqli_num_rows($resultCheck) > 0) {
      $updateConfirm = "UPDATE tbl_user SET IsEmailConfirmed=1, Token = '' WHERE UserID='$userID' ";
      $resultConfirm = mysqli_query($connection1, $updateConfirm) or die("Failed to query the query1 ".mysqli_error($connection1));

      //header('Location: https://www.hadycares.com/sign_in.php?action=2');
      header('Location: sign_in.php?action=2');
    } else {
      header('Location: sign_up.php');
    }
  }
?>
