<?php
  include "../db_conn.php";
  session_start();
  date_default_timezone_set("Asia/Manila");
  $adminCollege = $_SESSION['College'];

  if (isset($_GET['userID'])) {
    $userID = $_GET['userID'];
    $iconPic = $_GET['iconPic'];
    $output = array();

    $query1 = "UPDATE tbl_preference SET Icon='$iconPic' WHERE UserID = '$userID'";
    $result1 = mysqli_query($connection1, $query1) or die("Failed to query database ".mysqli_error());
    if(mysqli_affected_rows($connection1) > 0){
      $output['success'] = true;
    } else {
      $output['success'] = false;
    }
    echo json_encode($output);
  } else {
    if ($_POST["name"] == "Nickname") {
      $_SESSION['nickname'] = $_POST["value"];
    }

    $updateData = "UPDATE tbl_user SET ".$_POST["name"]." = '".$_POST["value"]."' WHERE UserID = '".$_POST["pk"]."' ";
    $resultData = mysqli_query($connection1, $updateData) or die("Failed to query the query1 ".mysqli_error($connection1));
  }


?>
