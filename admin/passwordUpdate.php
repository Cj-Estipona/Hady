<?php
  include "../db_conn.php";
  session_start();
  date_default_timezone_set("Asia/Manila");
  $adminCollege = $_SESSION['College'];

  $output = array();

  if (isset($_POST['action'])) {
    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $confirmPass = $_POST['confirmPass'];
    $userID = $_POST['userID'];

    $output['errorOldPass'] = false;
    $output['errorBothPass'] = false;

    $selectOldPass = "SELECT Password FROM tbl_user WHERE UserID = '$userID' and access_type = '1'";
    $resultSelected = mysqli_query($connection1, $selectOldPass) or die("Failed to query database 1".mysqli_error($connection1));
    $rowSelected = mysqli_fetch_array($resultSelected);

    if ($rowSelected['Password'] != MD5($oldPass)) {
      $output['success'] = false;
      $output['message'] = "You have entered an invalid old password";
      $output['errorOldPass'] = true;
    }else {
      if ($newPass != $confirmPass) {
        $output['success'] = false;
        $output['message'] = "Your new password and confirm password did not match";
        $output['errorBothPass'] = true;
      } else {
        $updatePass = "UPDATE tbl_user SET Password = MD5('$confirmPass') WHERE UserID='$userID' and access_type = '1'";
        $resultUpdate = mysqli_query($connection1, $updatePass) or die("Failed to query database 1".mysqli_error($connection1));
        $output['success'] = true;
        $output['message'] = "<div class='alert alert-success alert-dismissible'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Your password has been updated!</strong>
  </div>";
      }

    }


  }else {
    $output['success'] = false;
  }

  echo json_encode($output);
?>
