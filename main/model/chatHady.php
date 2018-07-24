<?php
  session_start();
  date_default_timezone_set("Asia/Manila");
  include '../../db_conn.php';
  $userID = $_SESSION['userId'];

  $request_body = json_decode(file_get_contents('php://input'));
  //$action = $request_body->action;
  $action = $_GET['action'];
  $output = array();
  $val = 0;


  if ($action == "checkChat") {
    $queryCheck = "SELECT * FROM tbl_preference WHERE UserID='$userID'";
    $resultCheck = mysqli_query($connection1, $queryCheck) or die("Failed to query database ".mysqli_error());
    $rowCheck = mysqli_fetch_array($resultCheck);

    if ($rowCheck) {
      $output['successCheck'] = true;
      $output['chatUse'] = $rowCheck['ChatUse'];
      $val = $output['chatUse'];
    } else {
      $output['successCheck'] = false;
    }
  }

  if($action == "setChat") {
    $val++;
    $querySet = "UPDATE tbl_preference SET ChatUse='$val' WHERE UserID = '$userID'";
    $resultSet = mysqli_query($connection1, $querySet) or die("Failed to query database ".mysqli_error());
    if(mysqli_affected_rows($connection1) > 0){
      $output['success'] = true;
    } else {
      $output['success'] = false;
    }
  }

  echo json_encode($output);


?>
